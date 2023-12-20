<?php

// namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Tests\TestCase;

// class TasksTest extends TestCase
// {
//     /**
//      * A basic feature test example.
//      */
//     // public function test_if_hompage_exist(): void
//     // {
//     //     $response = $this->get('/');
//     //     $response->assertStatus(200);
//     // }

//     public function test_if_index_task_page_loads_successfully(): void
//     {
//         $response = $this->get('/tasks/create');
//         $response->assertStatus(200);
//         $response->assertSee('Ajoute task');
//     }

// }
use Tests\TestCase;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;

class TasksTest extends TestCase
{
    // use RefreshDatabase; // Ensure a clean database for each test

    public function testIndex()
    {

        $project = Project::create([
            'name' => 'project 1',
            'description' => 'project 1',
        ]);
        
        $tasks = Task::create([
            'title' => 'Task 1',
            'description' => 'Task 1',
            'project_id' => $project->id, // Use the actual id of the created project
        ]);
        
        // dd($tasks);
        $response = $this->get('/tasks');


        // // Make a request to the index endpoint with a search query
        // $response = $this->get('/tasks', ['query' => 'Task']);

        // // Assert that the response has a successful status code
        // $response->assertStatus(200);

        // // Assert that the response contains the expected tasks
        // $response->assertSee('Task 1');

    }
}

