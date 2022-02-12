<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    //
    public function index()
    {
        # code...
        $lists = TodoList::all();
        return response()->json($lists);
    }

    public function show($id)
    {
        # code...
        $todo = TodoList::find($id);
        return response()->json($todo);
    }
}
