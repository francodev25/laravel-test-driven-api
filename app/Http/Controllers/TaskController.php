<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    //
    public function index()
    {
        # code...
        $tasks = Task::all();
        return response($tasks);
    }

    public function store(Request $request)
    {
        # code...
        $task = Task::create($request->all());
        return response($task,201);
    }

    public function destroy(Task $task)
    {
        # code...
        $task->delete();
        return response('',Response::HTTP_NO_CONTENT);
    }
}
