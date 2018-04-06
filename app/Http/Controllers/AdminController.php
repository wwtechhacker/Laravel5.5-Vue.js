<?php

namespace App\Http\Controllers;

use App\EventRegistration;
use App\Role;
use App\User;
use function array_keys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Zizaco\Entrust\Entrust;

class AdminController extends Controller
{
    private $user;

    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            $this->setMenu($request, $this->user);

            return $next($request);
        });
    }



    private function setMenu($request, $user)
    {
        // @todo menu urls
        $menu = [
            [
                'name' => 'Users',
                'url'  => '/admin/users',
                'role' => 'admin'
            ],
//            [
//                'name' => 'Cms',
//                'url'  => '/admin/cms',
//            ],
            [
                'name' => 'Events',
                'url'  => '/admin/registrations',
            ],
            [
                'name' => 'Logout',
                'url'  => '/admin/logout',
            ],
        ];

        $menu = array_filter($menu, function ($menu) use ($user) {
            if ($user->hasRole('admin')) {
                return true;
            }

            return empty($menu['role']) || $menu['role'] === 'manager';

        });

        $url     = $request->segment(1);
        $pattern = !empty($url) ? "/$url/" : false;
        $menu    = array_map(function ($n) use ($pattern) {
            $n['active'] = false;
            if ($pattern !== false && preg_match($pattern, $n['url'])) {
                $n['active'] = true;
            }

            return $n;
        }, $menu);

        view()->share('userAccount', $user->toArray());
        view()->share('menu', $menu);
    }

    function home()
    {
        return redirect()->action('AdminController@registrations');
    }

    function registrations(Request $request)
    {
        $orderBy           = $request->input('orderby', 'created_at');
        $order             = $request->input('order', 'asc');
        $filter            = $request->input('filter', 'pending');
        $download          = $request->input('download');
        $eventRegistration = new EventRegistration();

        $eventRegistrationQuery = EventRegistration::orderBy($orderBy, $order);
        if (!empty($filter) && $filter !== 'all') {
            $eventRegistration->status_name = $filter;
            $eventRegistrationQuery         = $eventRegistrationQuery->where('status', '=', $eventRegistration->status);
            if ($filter === 'pending') {
                $eventRegistrationQuery->orWhereNull('status');
            }
        }

        $eventRegistrations = $eventRegistrationQuery->get();
        $event              = $eventRegistrations->first();

        $rows = $eventRegistrations->map(function ($event) {
            return $event->toTable();
        });

        if ($download) {
            $filename = 'registrations.csv';
            $row = $rows->first();
            $handle = fopen($filename, 'w+');
            fputcsv($handle, array_pluck($row, 'eng_key'));
            $rows->map(function ($row) use ($handle) {
                $map = array_pluck($row, 'value');
                fputcsv($handle, $map);
            });

            fclose($handle);

            return response()->download($filename, $filename, [
                'Content-Type' => 'text/csv',
            ]);
        }

        $rows = ($rows->map(function ($n) {
            $fields = array_filter($n, function ($field) {
                if ($field['key'] === 'id') {
                    return true;
                }

                return $field['show'];
            });

            return $fields;
        }));

        $pageData = [
            'rows'   => $rows,
            'data'   => $eventRegistrations,
            'filter' => $filter
        ];

        return view('admin.registrations', $pageData);
    }

    function users()
    {
        $users = User::all()->map(function ($user) {
            $user->role = $user->hasRole('admin') ? 'admin' : 'manager';

            return $user;
        });

        return view('admin.users', ['users' => $users->toArray()]);
    }

    function login($id)
    {
        $user = User::where('id', $id)->first();
        if (!empty($user)) {
            Auth::login($user);
        }

        return redirect('/admin');

    }

    function addUser(Request $request)
    {
        $user           = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $roleName = $request->role;
        $role     = Role::findName($roleName);
        $user->attachRole($role);

        return redirect('admin/users');

    }

    function eventCreate(Request $request)
    {
        $eventRegistration = new EventRegistration;
        $fields            = $eventRegistration->getFields();

        return view('admin.event-create', [
            'header' => 'Add Event',
            'fields' => $fields
        ]);
    }

    function eventEdit(Request $request, $id)
    {
        $eventRegistration = EventRegistration::find($id);
        $fields            = $eventRegistration->getFields();

        return view('admin.event-create', [
            'header' => 'Edit Event',
            'model'  => $eventRegistration,
            'fields' => $fields
        ]);
    }
}
