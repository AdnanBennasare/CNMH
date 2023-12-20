<?php

namespace Database\Seeders;

// Rest of the code...
use Database\Seeders\PermissionHelper;

// Rest of the code...

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use PermissionHelper;



class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $controllers = ['Tasks'];

        foreach ($controllers as $controller) {
            $this->createPermissionsForController($controller);
        }
    }

    private function createPermissionsForController($controller)
    {
        $actions = ['create', 'store', 'show', 'edit', 'update', 'destroy', 'index'];
    
        foreach ($actions as $action) {
            $permissionName = $action . '-' . $controller . 'Controller';
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }
    
        // Add back the specific permission creation
        // Permission::create(['name' => 'getTasksByProject-TasksController', 'guard_name' => 'web']);
    }
}
