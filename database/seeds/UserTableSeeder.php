<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'email' => 'admin@admin.com',
                'password' => '$2y$10$imU.Hdz7VauIT3LIMCMbsOXvaaTQg6luVqkhfkBcsUd.SJW2XSRKO',
                'name' => 'Admin',
                'family' => 'admin',
                'mobile' => '09100000000',
                'birthday' => '1998-08-29'
            ]
        ];

        User::insert($users);
    }
}
