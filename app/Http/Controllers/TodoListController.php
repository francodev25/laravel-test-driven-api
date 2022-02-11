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
        return response($lists);
    }
}
