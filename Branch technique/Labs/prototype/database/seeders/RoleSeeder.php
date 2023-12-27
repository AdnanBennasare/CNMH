<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'member', 'guard_name' => 'web']);
        Role::create(['name' => 'project_leader', 'guard_name' => 'web']);

       
        
    }
}
