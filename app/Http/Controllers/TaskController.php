<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

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
}
