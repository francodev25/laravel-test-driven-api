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
    public function test_fetch_all_todo_list()
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
        
        # Create fake data at DB : 2 ToDos
        $todo1FakeDB = TodoList::factory()->create();
        TodoList::factory()->create();

        #Get Response
        $response = $this->getJson(route('todo-list.all'));

        [$todo1Response] = $response?->json();

        // dd($todo1Response);
        
        //Expect two ToDos
        $this->assertEquals(2,count($response?->json()));

        //The first One todo List res is Equal to first at DB
        $this->assertEquals($todo1FakeDB['name'],$todo1Response['name']);

    }


    public function test_fetch_single_todo_list(){
        //preparation 
        $todo = TodoList::factory()->create();

        //action && //assertion
        $response = $this->getJson(route('todo-list.show',$todo->id))
                            ->assertOk()
                            ->json();

        $this->assertEquals($todo->name, $response['name']);
    }


}
