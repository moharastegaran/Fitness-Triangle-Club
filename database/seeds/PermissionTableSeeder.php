<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id' => '1',
                'title' => 'admin panel access',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '2',
                'title' => 'workout create',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '3',
                'title' => 'workout show',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '4',
                'title' => 'workout edit',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '5',
                'title' => 'workout delete',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '6',
                'title' => 'workout access',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '7',
                'title' => 'user delete',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '8',
                'title' => 'user show',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '9',
                'title' => 'user index',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '10',
                'title' => 'admin panel access',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '11',
                'title' => 'category access',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '12',
                'title' => 'category index',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '13',
                'title' => 'category create',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '14',
                'title' => 'category edit',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '15',
                'title' => 'category delete',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '16',
                'title' => 'program access',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '17',
                'title' => 'program index',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],[
                'id' => '18',
                'title' => 'program create',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],[
                'id' => '19',
                'title' => 'blog create',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id' => '20',
                'title' => 'blog index',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],[
                'id' => '21',
                'title' => 'blog edit',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],[
                'id' => '22',
                'title' => 'blog delete',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
        ];

        Permission::insert($permissions);
    }
}
