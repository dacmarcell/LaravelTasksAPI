<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    static public function index(){
        $tasks = Task::all();
        return response()->json($tasks);
    }

    static public function show($id){
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    static public function store(Request $request){
        $validated = $request->validate([
            "title" => "required|string",
            "description" => "required|string",
            "status" => "required|in:pending,in-progress,finished"
        ]);

        $task = Task::create($validated);
        return response()->json($task, 201);
    }

    static public function update(Request $request, $id){
        $task = Task::findOrFail($id);
        $validated = $request->validate([
            "title"=> "required|string",
            "description"=> "required|string",
            "status"=> "required|in:pending,in-progress,finished",
        ]);

        $task->update($validated);

        return response()->json($task);
    }

    static public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(null, 204);
    }
}
