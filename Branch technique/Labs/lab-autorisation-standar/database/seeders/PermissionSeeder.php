<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use PermissionHelper;
use Database\Seeders\PermissionHelper;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission::create(['name' => 'index-TasksController', 'guard_name' => 'web']);
        // Permission::create(['name' => 'show-TasksController', 'guard_name' => 'web']);
        // Permission::create(['name' => 'create-TasksController', 'guard_name' => 'web']);
        // Permission::create(['name' => 'store-TasksController', 'guard_name' => 'web']);
        // Permission::create(['name' => 'edit-TasksController', 'guard_name' => 'web']);
        // Permission::create(['name' => 'update-TasksController', 'guard_name' => 'web']);
        // Permission::create(['name' => 'destroy-TasksController', 'guard_name' => 'web']);

        foreach(PermissionHelper::generatePermissions() as $permission) {
            if(Permission::where('name', $permission)->doesntExist()) {
                Permission::create(['name' => $permission]);
            }
        }

    }
}
