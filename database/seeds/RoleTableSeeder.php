<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [[
            'id'         => 1,
            'title'      => 'Admin',
            'created_at' => '2019-04-15 19:13:32',
            'updated_at' => '2019-04-15 19:13:32',
        ],
            [
                'id'         => 2,
                'title'      => 'User',
                'created_at' => '2019-04-15 19:13:32',
                'updated_at' => '2019-04-15 19:13:32',
            ]];

        Role::insert($roles);

    }
}
