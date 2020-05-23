<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.N
     *
     * @return void
     */
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $user_permissions = $admin_permissions->filter(function ($permission){
            return substr($permission->title, 0, 5) != 'admin'
                && substr($permission->title, 0, 7) != 'workout'
                && substr($permission->title, 0, 4) != 'user'
                && substr($permission->title, 0, 4) != 'blog';
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}
