<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    private $users;
    private $roles = [
        'manager' => [
            'display_name' => 'Project Manager',
            'description'  => 'User is a manager of the given project'
        ],
        'admin'   => [
            'display_name' => 'System Admin',
            'description'  => 'User is a System Administrator'
        ],
    ];

    private function getFile()
    {
        return base_path('database/seeds/users.php');
    }

    private function createRoles()
    {
        foreach ($this->roles as $name => $roleData) {
            $role               = new Role;
            $role->name         = $name;
            $role->display_name = $roleData['display_name'];
            $role->description  = $roleData['description'];
            $role->save();
        }
    }

    private function addRoles()
    {
        $users = User::all();
        $role  = Role::findName('admin');

        $users->map(function ($user) use ($role) {
            $user->attachRole($role);
        });
    }

    private function prepPassword($users)
    {
        return array_map(function ($user) {
            $user['password'] = bcrypt($user['password']);

            return $user;
        }, $users);
    }

    private function setDefaults()
    {
        if (file_exists($this->getFile())) {
            $users       = include $this->getFile();
            $this->users = $this->prepPassword($users);
        }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->setDefaults();

        if (!empty($this->users)) {
            foreach ($this->users as $user) {
                // Base admin user
                DB::table('users')->insert([
                    'name'     => $user['name'],
                    'email'    => $user['email'],
                    'password' => $user['password'],
                ]);
            }
        }

        $this->createRoles();
        $this->addRoles();

    }
}
