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
        
    }
}
