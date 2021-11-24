<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $permissions = [
        //     'role-list',
        //     'role-create',
        //     'role-edit',
        //     'role-delete',
        //     'users-list',
        //     'users-create',
        //     'users-edit',
        //     'users-delete'
        // ];
        // foreach ($permissions as $permission) {
        //     Permission::create(['name' => $permission]);
        // }  
        Permission::create(['name'=>'role-list', 'friendly_title'=>'List of Roles']);
        Permission::create(['name'=>'role-create', 'friendly_title'=>'Create Roles']);
        Permission::create(['name'=>'role-edit', 'friendly_title'=>'Edit Roles']);
        Permission::create(['name'=>'role-delete', 'friendly_title'=>'Delete Roles']);
        Permission::create(['name'=>'users-list', 'friendly_title'=>'List of Users']);
        Permission::create(['name'=>'users-create', 'friendly_title'=>'Create Users']);
        Permission::create(['name'=>'users-edit', 'friendly_title'=>'Edit Users']);
        Permission::create(['name'=>'users-delete', 'friendly_title'=>'Delete Users']);
        Permission::create(['name'=>'permission-list', 'friendly_title'=>'List of Permissions']);
        Permission::create(['name'=>'permission-create', 'friendly_title'=>'Create Permissions']);
        Permission::create(['name'=>'permission-edit', 'friendly_title'=>'Edit Permissions']);
        Permission::create(['name'=>'permission-delete', 'friendly_title'=>'Delete Permissions']);

    }
}
