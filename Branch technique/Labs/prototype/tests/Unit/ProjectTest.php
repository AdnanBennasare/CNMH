<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_returns_create_view_for_project_leader()
    {
        // Arrange
        $user = User::create([
            'name' => 'Chef de projet',
            'email' => 'projectleader1234@solicode.com',
            'password' => Hash::make('projectleader1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user->assignRole('project_leader');
        $user->givePermissionTo('create-ProjectController');
        // Act
        $response = $this->actingAs($user)->get(route('projects.create'));

        // Debug
        dd($response->getContent());

        // Assert
        $response->assertViewIs('projects.create');
        $response->assertStatus(200);
    }
}
