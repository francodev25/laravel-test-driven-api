<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{


    use RefreshDatabase;


    private $todoList;

    public function setUp():void
    {
        # code...
        parent::setUp();

        $this->todoList = TodoList::factory()->create();
    }


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
        

        #Get Response
        $response = $this->getJson(route('todo-list.all'))
                            ->assertOk()
                            ->json();

        [$todo1Response] = $response;

        // dd($todo1Response);
        
        //Expect two ToDos
        $this->assertEquals(1,count($response));

        //The first One todo List res is Equal to first at DB
        $this->assertEquals($this->todoList['name'],$todo1Response['name']);

    }


    public function test_fetch_single_todo_list(){
        //preparation 


        //action && //assertion
        $response = $this->getJson(route('todo-list.show',$this->todoList))
                            ->assertOk()
                            ->json();

        $this->assertEquals($this->todoList['name'], $response['name']);
    }


    public function test_store_new_todo_list(){
        $todo = TodoList::factory()->create();
        $response = $this->postJson(route('todo-list.store',['name' => $todo->name ]))->assertCreated()->json();

        $this->assertEquals($todo->name,$response['name']);

        $this->assertDatabaseHas('todo_lists', ['name' => $todo->name]);

    }

}
