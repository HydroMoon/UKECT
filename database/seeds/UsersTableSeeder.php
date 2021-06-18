<?php

use App\Admin;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRole = Role::where('name', '=', 'User')->first();
        $adminRole = Role::where('name', '=', 'Admin')->first();
        $permissions = Permission::all();

        /*
         * Add Users
         *
         */
        if (Admin::where('email', '=', 'admin@omdurman-cat.edu.sd')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'Admin',
                'phone'    => '0925426241',
                'email'    => 'admin@omdurman-cat.edu.sd',
                'password' => bcrypt('omdurman12..'),
            ]);

            $newUser->attachRole($adminRole);
            foreach ($permissions as $permission) {
                $newUser->attachPermission($permission);
            }
        }

        // if (User::where('email', '=', 'user@user.com')->first() === null) {
        //     $newUser = User::create([
        //         'name'     => 'User',
        //         'email'    => 'user@user.com',
        //         'password' => bcrypt('password'),
        //     ]);

        //     $newUser;
        //     $newUser->attachRole($userRole);
        // }
    }
}
