<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoCompleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // PATCH http://127.0.0.1:8000/api/tasks/{task}/complete
    public function __invoke(Request $request, Todo $task)
    {
        $task->is_completed = $request->is_completed;
        $task->save();

        return TodoResource::make($task);
    }
}
