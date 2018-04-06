<?php

namespace App\Http\Controllers;

use App\EventRegistration;
use App\Http\Resources\MarkerResource;
use App\Http\Resources\Markers;
use App\Marker;
use const ARRAY_FILTER_USE_BOTH;
use Cswiley\Cms\Cms;
use Illuminate\Http\Request;
use Html;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use function json_encode;
use function strlen;

class AppController extends Controller
{
    private $cms;
    private $request;
    private $prototype = true;

    public function __construct(Cms $cms, Request $request)
    {
        $this->cms     = $cms;
        $this->request = $request;
        $this->setMenu();
        View::share('prototype', $this->prototype);
        View::share('globals', $this->cms->get('globals'));
    }

    private function setMenu()
    {
        // @todo menu urls
        $menu = [
            [
                'name' => 'Register an Event',
                'url'  => '/registration',
            ],
            [
                'name' => 'Beverage Breakdown',
                'url'  => '/beverage-breakdown',
            ],
            [
                'name' => 'Resources',
                'url'  => '/resources',
            ]
        ];

        $url     = $this->request->segment(1);
        $pattern = !empty($url) ? "/$url/" : false;
        $menu    = array_map(function ($n) use ($pattern) {
            $n['active'] = false;
            if ($pattern !== false && preg_match($pattern, $n['url'])) {
                $n['active'] = true;
            }

            return $n;
        }, $menu);

        view()->share('menu', $menu);
    }

    function home()
    {
        $data = $this->cms->get('home');
        return view('home', $data);
    }

    function page(Request $request)
    {
        $page         = $request->segment(1);
        $data         = $this->cms->get($page);
        $data['page'] = $page;
//        if ($page === 'day') {
//            $data = $this->dayPage($data);
//        }
        if (View::exists($page)) {
            return view($page, $data);
        }

        abort(404);
    }

    function dayPage($data)
    {
        if ($this->prototype) {

        }

    }

    function register()
    {
//        $timezone                = 'America/New_York';
        $formData                = $this->request->input('formData');
        $eventRegistration       = new EventRegistration();
        $eventStart              = new Carbon($formData['date'] . ' ' . $formData['start_time']);
        $eventEnd                = new Carbon($formData['date'] . ' ' . $formData['end_time']);
        $formData['event_start'] = $eventStart->getTimestamp();
        $formData['event_end']   = $eventEnd->getTimestamp();

        $blacklist = [
            'start_time',
            'end_time',
            'date'
        ];

        $eventData = array_filter($formData, function ($n, $key) use ($blacklist) {
            return !in_array($key, $blacklist);
        }, ARRAY_FILTER_USE_BOTH);

        $eventRegistration->fill($eventData);
        $success = $eventRegistration->save();

        return response()->json([
            'ok'   => $success,
            'type' => 'eventRegistration',
            'data' => $eventRegistration->toArray()
        ]);

    }

}
