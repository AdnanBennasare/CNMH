<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;




class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
  
        $leaderPermissions = Permission::pluck('name')->toArray();

       $projectLeader =  User::create([
            'name' => 'Chef de projet',
            'email' => 'projectleader1234@solicode.com',
            'password' => Hash::make('projectleader1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $projectLeader->assignRole('project_leader');
        $projectLeader->givePermissionTo($leaderPermissions);


        

        $user = User::create([
                'name' => 'membre',
                'email' => 'membre1234@solicode.com',
                'password' => Hash::make('membre1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ])->assignRole('member');

        $user->givePermissionTo('index-TasksController', 'index-ProjectController');
    }
}
