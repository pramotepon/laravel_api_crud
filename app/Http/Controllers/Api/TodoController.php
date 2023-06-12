<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Http\Resources\TodoResource;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // GET http://127.0.0.1:8000/api/tasks
    public function index()
    {
        return TodoResource::collection(Todo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    // POST http://127.0.0.1:8000/api/tasks
    public function store(StoreTodoRequest $request)
    {
        $task = Todo::create($request->validated());
        return TodoResource::make($task);
    }

    /**
     * Display the specified resource.
     */
    // GET http://127.0.0.1:8000/api/tasks/{task}
    public function show(Todo $task)
    {
        return TodoResource::make($task);
    }

    /**
     * Update the specified resource in storage.
     */
    // PUT http://127.0.0.1:8000/api/tasks/{task}
    public function update(UpdateTodoRequest $request, Todo $task)
    {
        $task->update($request->validated());
        return TodoResource::make($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    // DELETE http://127.0.0.1:8000/api/tasks/{task}
    public function destroy(Todo $task)
    {
        $task->delete();
        return response()->noContent();
    }
}
