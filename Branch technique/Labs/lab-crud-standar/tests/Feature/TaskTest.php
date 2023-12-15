<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index_page(): void
    {
        $response = $this->get('/projects');
        $response->assertSee(value: 'les projets');
        $response->assertStatus(200);
    }
}
