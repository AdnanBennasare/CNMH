<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_tasks_create_page()
    {  

       

        $userData = [
          'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        $user = User::create($userData);
        $permissionData = [
            'name' => 'create-TasksController',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now()
        ];

        $permission = Permission::create($permissionData);
        $user->givePermissionTo($permission);
        $hasPermission = $user->hasPermissionTo($permission);

        // Assert
        $this->assertTrue($hasPermission);
        // Assert
        $this->assertDatabaseHas('users', $userData);
        // Assert
        $this->assertDatabaseHas('permissions', $permissionData);
        $this->actingAs($user);
             
        $gettingCreateRoute = $this->get(route('tasks.create'));
        $gettingCreateRoute->assertStatus(200);
        $gettingCreateRoute->assertViewIs('tasks.create');
        // dd($gettingCreateRoute->getContent());


     
    }


    public function test_update_task()
    {
        // Arrange
        $user = User::create([
            'name' => 'Test User 2',
            'email' => 'testuser2@example.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $project = Project::create([
            'name' => 'Test Project 2',
            'description' => 'Project description 2',
            'start_date' => '2022-01-01',
            'end_date' => '2022-01-31',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $project_id =  $project->id;
        $task = Task::create([
            'title' => 'Test Task 2',
            'description' => 'Task description 2',
            'project_id' => $project_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $permissionData = [
         
                'name' => 'update-TasksController',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
 
        ];
    

      
        $permission = Permission::create($permissionData);

        // Create a user with necessary permissions
        $user->givePermissionTo($permission);
        // Act
        $this->actingAs($user);
        $task_id = $task->id;

        // Make a POST request to the update endpoint
        $updatedData = [
            'title' => 'Updated Task Title 2',
            'description' => 'Updated Task Description',
            'project_id' => $project_id,
        ];
        $response = $this->patch(route('tasks.update', $task_id), $updatedData);

        // Assert
        // $response->assertRedirect(route('tasks.index')); // Check if the user is redirected to the correct route
        $this->assertDatabaseHas('tasks', [
            'id' => $task_id,
            'title' => 'Updated Task Title 2',
            'description' => 'Updated Task Description',
            'project_id' => $project_id,
        ]); // Check if the task is updated in the database
        
    }
}
