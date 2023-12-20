<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class tasksTest extends TestCase
{

    public function test_tasks_page(): void
    {
        $this->withoutExceptionHandling();
    
        $response = $this->get('/tasks');
   
        
    }
    
}
