<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            [
                'name' => 'project_leader',
                'email' => 'projectleader@solicode.co',
                'role' => 'project_leader',
                'password' => Hash::make('projectleader'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'membre',
                'email' => 'member1234@solicode.co',
                'role' => 'member',
                'password' => Hash::make('member1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);


        // $Permissions = [
        //     'index-TasksController',
        //     'create-TasksController',
        //     'store-TasksController',
        //     'edit-TasksController',
        //     'update-TasksController',
        //     'destroy-TasksController',
        // ];
        $leaderPermissions = Permission::pluck('name')->toArray();

       $projectLeader =  User::create([
            'name' => 'Chef de projet',
            'email' => 'project.leader@solicode.com',
            'password' => Hash::make('project.leader@solicode.com'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $projectLeader->assignRole('project-leader');
        $projectLeader->givePermissionTo($leaderPermissions);
        
        $superAdmin = User::create([
            'name' => 'Super Admin',
                'email' => 'Super.Admin@gmail.com',
                'password' => Hash::make('Super.Admin'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ]);

        $superAdmin->assignRole('Super Admin');

        $user = User::create([
            'name' => 'membre',
                'email' => 'membre@solicode.com',
                'password' => Hash::make('membre'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ])->assignRole('member');
        // $user->givePermissionTo('create-TasksController');
        
    }
}
