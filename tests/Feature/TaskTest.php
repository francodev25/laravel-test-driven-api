<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{   

    use RefreshDatabase;

    public function setUp():void
    {
        # code...
        parent::setUp();
        $this->authUser();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fetch_all_tasks_of_a_todo_list()
    {
        $todoList = $this->createTodoList();
        $task = $this->createTask(['todo_list_id' => $todoList->id]);
        
        
        $response = $this->getJson(route('todo-list.task.index',$todoList->id))->assertOk()->json();
        $this->assertEquals(1,count($response));
        $this->assertEquals($task->title,$response[0]['title']);
        $this->assertEquals($response[0]['todo_list_id'],$todoList->id);


    }

    public function test_store_a_task_for_a_todo_list(){
        $todoList = $this->createTodoList();
        $task = Task::factory()->make();
        $this->postJson(route('todo-list.task.store',$todoList->id),['title' => $task->title])->assertCreated()->json();
        
        $this->assertDatabaseHas('tasks', [
            'title' => $task->title, 
            'todo_list_id' => $todoList->id]);
    }

    public function test_delete_a_task_from_database(){
        
        $task = $this->createTask();

        $this->deleteJson(route('task.destroy',$task->id))->assertNoContent();
        $this->assertDatabaseMissing('tasks', ['title' => $task->title]);
    }

    public function test_update_a_task_of_a_todo_list()
    {
        # code...
        $task = $this->createTask();

        $this->patchJson(route('task.update',$task->id),['title' => 'updatedd title'])->assertOk();

        $this->assertDatabaseHas('tasks',['title' => 'updatedd title']);
    }
}
