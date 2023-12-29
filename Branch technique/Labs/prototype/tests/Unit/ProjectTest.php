<?php

namespace Tests\Unit;


use Carbon\Carbon;
use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use RefreshDatabase, WithFaker;





    public function test_index_projects()
    {
        // Arrange
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $projects = Project::factory(2)->create(); // Create 5 projects for testing
        $permissionData = [
            'name' => 'index-ProjectController',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now()
        ];

        $permission = Permission::create($permissionData);
        $user->givePermissionTo($permission);
        // Act
        $this->actingAs($user);

        // Make a GET request to the index endpoint
        $response = $this->get(route('projects.index'));

        // Assert
        $response->assertStatus(200); // Check if the response status is OK
        $response->assertViewIs('projects.index'); // Check if the correct view is returned
        $response->assertViewHas('projects');
    }



















    public function test_create_page()
    {  
        $userData = [
            'name' => 'aaaa1111',
            'email' => 'aaaa1111@solicode.com',
            'password' => Hash::make('aaaa1111'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        $user = User::create($userData);
        $permissionData = [
            'name' => 'create-ProjectController',
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
             
        $gettingCreateRoute = $this->get(route('projects.create'));
        $gettingCreateRoute->assertStatus(200);
        $gettingCreateRoute->assertViewIs('projects.create');
        // dd($gettingCreateRoute->getContent());


     
    }


    public function test_store_project()
    {
        $userData = [
            'name' => 'aaaa2222',
            'email' => 'aaaa2222@solicode.com',
            'password' => Hash::make('aaaa1111'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        $user = User::create($userData);
        $permissionData = [
            'name' => 'store-ProjectController',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    
        $permission = Permission::create($permissionData);
    
        // Create a user with necessary permissions
        $user->givePermissionTo($permission);
    
        // Acting as the user with permissions
        $this->actingAs($user);
    
        // Create fake data for project
        $projectData = [
            'name' => "CNMH",
            'description' => "centre nationale des handicaps",
            'start_date' => "11/2/2000",
            'end_date' => "11/2/2020",
        ];
    
        // Make a POST request to the store endpoint
        $response = $this->post(route('projects.store'), $projectData);
    

    
        // Assert that the project was stored in the database
        $this->assertDatabaseHas('projects', $projectData);
    
        // Assert that the user is redirected to the index route
        $response->assertRedirect(route('projects.index'));
        // Assert that a success message is present in the session
    }
    public function test_edit_project()
    {
        // Arrange
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $project = Project::create([
            'name' => 'Test Project',
            'description' => 'Project description',
            'start_date' => '2022-01-01',
            'end_date' => '2022-01-31',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $permissionData = [
            'name' => 'edit-ProjectController',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    
        $permission = Permission::create($permissionData);
    
        // Create a user with necessary permissions
        $user->givePermissionTo($permission);
      
        $project_id = $project->id;
        // Act
        $this->actingAs($user);

        // Make a GET request to the edit endpoint
        $response = $this->get(route('projects.edit', $project_id));

        // Assert
        // dd($response);
        $response->assertStatus(200); // Check if the response status is OK
        $response->assertViewIs('projects.update'); // Check if the correct view is returned
        $response->assertViewHas('project', $project); // Check if the project is passed to the view
    } 



    public function test_edit_nonexistent_project()
    {
        // Arrange
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $permissionData = [
            'name' => 'edit-ProjectController',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    
        $permission = Permission::create($permissionData);
    
        // Create a user with necessary permissions
        $user->givePermissionTo($permission);
        // Act
        $this->actingAs($user);
        $project_id = 999;

        // Make a GET request to the edit endpoint with a nonexistent project ID
        $response = $this->get(route('projects.edit', $project_id));

        // Assert
        $response->assertStatus(404); // Check if the response status is 404 (Not Found)
    }
    


    public function test_update_project()
    {
        // Arrange
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $project = Project::create([
            'name' => 'Test Project',
            'description' => 'Project description',
            'start_date' => '2022-01-01',
            'end_date' => '2022-01-31',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $updatedData = [
            'name' => 'Updated Project',
            'description' => 'Updated description',
            'start_date' => '2022-02-01',
            'end_date' => '2022-02-28',
        ];
        $permissionData = [
            'name' => 'update-ProjectController',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    
        $permission = Permission::create($permissionData);
    
        // Create a user with necessary permissions
        $user->givePermissionTo($permission);
        // Act
        $this->actingAs($user);
        $project_id = $project->id;
        // Make a PATCH request to the update endpoint
        $response = $this->patch(route('projects.update', $project_id), $updatedData);

        // Assert
        $response->assertRedirect(route('projects.index'));
        $this->assertDatabaseHas('projects', $updatedData); // Check if the project was updated in the database
    }



    
    public function test_show_project()
    {
        // Arrange
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $project = Project::create([
            'name' => 'Test Project',
            'description' => 'Project description',
            'start_date' => '2022-01-01',
            'end_date' => '2022-01-31',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $permissionData = [
            'name' => 'show-ProjectController',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    
        $permission = Permission::create($permissionData);
    
        // Create a user with necessary permissions
        $user->givePermissionTo($permission);
        // Act
        $this->actingAs($user);
        $project_id = $project->id;

        // Make a GET request to the show endpoint
        $response = $this->get(route('projects.show', $project_id));

        // Assert
        $response->assertStatus(200); // Check if the response status is OK
        $response->assertViewIs('projects.view'); // Check if the correct view is returned
        $response->assertViewHas('project', $project); // Check if the project is passed to the view
    }




    public function test_destroy_project()
    {
        // Arrange
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $project = Project::create([
            'name' => 'Test Project',
            'description' => 'Project description',
            'start_date' => '2022-01-01',
            'end_date' => '2022-01-31',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $permissionData = [
            'name' => 'destroy-ProjectController',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    
        $permission = Permission::create($permissionData);
    
        // Create a user with necessary permissions
        $user->givePermissionTo($permission);
        // Act
        $this->actingAs($user);
        $project_id = $project->id;

        // Make a DELETE request to the destroy endpoint
        $response = $this->delete(route('projects.destroy', $project_id));

        // Assert
        $response->assertRedirect(route('projects.index'));
        $this->assertDatabaseMissing('projects', ['id' => $project->id]); // Check if the project was deleted from the database
    }

}
