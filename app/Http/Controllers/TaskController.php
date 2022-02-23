<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    //
    public function index(TodoList $todo_list)
    {
        # code...
        // $tasks = Task::where(['todo_list_id' => $todo_list->id])->get();
        $tasks = $todo_list->tasks;
        return response($tasks);
    }

    public function store(Request $request, TodoList $todo_list)
    {
        # code...
        $task = $todo_list->tasks()->create($request->all());
        // $request['todo_list_id'] = $todo_list->id;
        // $task = Task::create($request->all());

        return response($task,201);
    }

    public function destroy(Task $task)
    {
        # code...
        $task->delete();
        return response('',Response::HTTP_NO_CONTENT);
    }

    public function update(Task $task, Request $request)
    {
        # code...
        $task->update($request->all());
        return response($task);
    }
}
