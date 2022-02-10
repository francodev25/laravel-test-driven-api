<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store_todo_list()
    {
        // preparation / prepare

        // action / performe

        // assertion / predict

        
        $response = $this->getJson(route('todo-list.store'));

        // $response = $this->get('/');
        // dd($response->json());
        
        $this->assertEquals(1,count($response->json()));
    }
}
