<?php

namespace App\Http\Controllers;

use App\Models\TodoList;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TodoListController extends Controller
{
    //
    public function index()
    {
        # code...
        $lists = TodoList::all();
        return response()->json($lists);
    }

    public function show(TodoList $todoList)
    {
        # code...
        return response()->json($todoList);
    }

    public function store(Request $request){
        $request->validate(['name' => ['required']]);

        $list = TodoList::create($request->all());
        return response($list,  Response::HTTP_CREATED);
    }

    public function destroy(TodoList $todoList)
    {
        # code...
        $todoList->delete();

        return response('',Response::HTTP_NO_CONTENT);
    }
}
