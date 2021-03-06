<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoListRequest;
use App\Models\TodoList;
use Symfony\Component\HttpFoundation\Response;

class TodoListController extends Controller
{
    //
    public function index()
    {
        # code...
        // $lists = TodoList::whereUserId(auth()->id())->get();
        $lists = auth()->user()->todo_lists;
        return response()->json($lists);
    }

    public function show(TodoList $todoList)
    {
        # code...
        return response()->json($todoList);
    }

    public function store(TodoListRequest $request){

        return auth()->user()->todo_lists()->create($request->validated());
        // $list = TodoList::create($request->all());
        // return response($list,  Response::HTTP_CREATED);
    }

    public function destroy(TodoList $todoList)
    {
        # code...
        $todoList->delete();

        return response('',Response::HTTP_NO_CONTENT);
    }

    public function update(TodoListRequest $request, TodoList $todoList)
    {
        # code...
        $todoList->update($request->all());

        return response($todoList);
    }
}
