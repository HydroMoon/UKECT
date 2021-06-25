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
        $adminRole = Role::where('name', '=', 'Teacher')->first();

        /*
         * Add Users
         *
         */
        if (Admin::where('email', '=', 'arabic@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ اللغة العربية',
                'phone'    => '0111111111',
                'email'    => 'arabic@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }

        if (Admin::where('email', '=', 'english@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ اللغة الانجليزية',
                'phone'    => '0111111112',
                'email'    => 'english@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }

        if (Admin::where('email', '=', 'math@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ الحسبان',
                'phone'    => '0111111113',
                'email'    => 'math@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }

        if (Admin::where('email', '=', 'islam@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ الثقافة الاسلامية',
                'phone'    => '0111111114',
                'email'    => 'islam@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }

        if (Admin::where('email', '=', 'economy@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ الاقتصاد',
                'phone'    => '0111111115',
                'email'    => 'economy@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }

        if (Admin::where('email', '=', 'manage@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ الادارة',
                'phone'    => '0111111116',
                'email'    => 'manage@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }

        if (Admin::where('email', '=', 'account@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ المحاسبة',
                'phone'    => '0111111117',
                'email'    => 'account@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }

        if (Admin::where('email', '=', 'fly@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ الطيران',
                'phone'    => '0111111118',
                'email'    => 'fly@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }

        if (Admin::where('email', '=', 'politics@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ السياسة',
                'phone'    => '0111111119',
                'email'    => 'politics@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }

        if (Admin::where('email', '=', 'law@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ القانون',
                'phone'    => '0111111120',
                'email'    => 'law@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }

        if (Admin::where('email', '=', 'computer@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ الحاسوب',
                'phone'    => '0111111121',
                'email'    => 'computer@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }

        if (Admin::where('email', '=', 'french@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ اللغة الفرنسة',
                'phone'    => '0111111122',
                'email'    => 'french@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }

        if (Admin::where('email', '=', 'psycho@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ علم النفس',
                'phone'    => '0111111123',
                'email'    => 'psycho@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }

        if (Admin::where('email', '=', 'human-con@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ الاتصالات البشرية',
                'phone'    => '0111111124',
                'email'    => 'human-con@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }

        if (Admin::where('email', '=', 'custom@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ الجمارك',
                'phone'    => '0111111125',
                'email'    => 'custom@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }

        if (Admin::where('email', '=', 'trade@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ التجارة',
                'phone'    => '0111111126',
                'email'    => 'trade@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }

        if (Admin::where('email', '=', 'market@ocat.com')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'استاذ التسويق',
                'phone'    => '0111111127',
                'email'    => 'market@ocat.com',
                'password' => bcrypt('teacher12'),
            ]);

            $newUser->attachRole($adminRole);
        }
    }
}
