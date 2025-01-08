<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    static public function index(){
        $tasks = Task::with('categories')->get();
        return response()->json($tasks);
    }

    static public function show($id){
        $task = Task::find($id);

        if(!$task){
            return response()->json(["message" => "Task not found"], 404);
        }

        return response()->json($task);
    }

    static public function store(Request $request){
        $validated = $request->validate([
            "title" => "required|string",
            "description" => "required|string",
            "status" => "required|in:pending,in-progress,finished",
            "category_name" => "required|string",
        ]);

        $task = Task::create([
            "title" => $validated["title"],
            "description" => $validated["description"],
            "status" => $validated["status"],
        ]);

        $category = Category::firstOrCreate(
            ['name' => $validated['category_name']],
            [
                'name' => $validated['category_name'],
                'task_id' => $task->id
            ]
        );

        $task->categories()->save($category);

        return response()->json($task->load('categories'), 201);
    }

    static public function update(Request $request, $id){
        $task = Task::findOrFail($id);

        $validated = $request->validate([
            "title"=> "nullable|string",
            "description"=> "nullable|string",
            "status"=> "nullable|in:pending,in-progress,finished",
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
