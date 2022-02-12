<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{


    use RefreshDatabase;

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
        
        /* Don't create data like this, otherwise you should
        * set each every field when you create in this file.
        * So it is not recommended.
        * TodoList::create(['name' => 'my list']);
        * Use TodoList::factory()->create() instead
        */
        $list = TodoList::factory()->create();



        $response = $this->getJson(route('todo-list.store'));

        // $response = $this->get('/');
        // dd($response->json());
        
        $this->assertEquals(1,count($response->json()));

        //The first One todo List is the created
        $this->assertEquals($list->name,$response->json()[0]['name']);

    }
}
