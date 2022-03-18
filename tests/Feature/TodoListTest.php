<?php

namespace Tests\Feature;

use App\Models\TodoList;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TodoListTest extends TestCase
{


    use RefreshDatabase;


    private $todoList;

    public function setUp():void
    {
        # code...
        parent::setUp();
        $user = $this->authUser();
        $this->todoList = $this->createTodoList(['name' => 'my List', 'user_id' => $user->id]);
    }


    public function createTodoList( $args = []){
        return TodoList::factory()->create($args);
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
        $response = $this->getJson(route('todo-list.index'))
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

    public function test_while_storing_todo_list_name_field_is_required(){
        $this->withExceptionHandling();
        //assert Not found without parameters is a great tip. It returns the actual status.
        $this->postJson(route('todo-list.store'))
                         ->assertUnprocessable(422)
                         ->assertJsonValidationErrors(['name']);
    }


    public function test_delete_todo_list()
    {
        # code...
        $this->deleteJson(route('todo-list.destroy', $this->todoList))->assertNoContent();

        $this->assertDatabaseMissing('todo_lists', ['name' => $this->todoList->name]);
    }

    public function test_update_todo_list(){
        $this->patchJson(route('todo-list.update', $this->todoList->id),['name' => 'updated name'])
            ->assertOk();

        $this->assertDatabaseHas('todo_lists',[
            'id' => $this->todoList->id,
            'name' => 'updated name',
        ]);

    }

    public function test_while_updating_todo_list_name_field_is_required()
    {
        # code...
        $this->withExceptionHandling();

        $this->patchJson(route('todo-list.update',$this->todoList))
             ->assertUnprocessable(422)
             ->assertJsonValidationErrors(['name']);

    }

}
