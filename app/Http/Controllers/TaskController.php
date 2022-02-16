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
}
