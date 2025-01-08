<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    static public function index(){
        $categories = Category::all();
        return response()->json($categories);
    }

    static public function show($id){
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    static public function store(Request $request){
        $validated = $request->validate([
            "name" => "required|string",
            "task_id" => "required|int",
        ]);

        $category = Category::create($validated);
        return response()->json($category, 201);
    }

    static public function update(Request $request, $id){
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            "name"=> "required|string"
        ]);

        $category->update($validated);

        return response()->json($category);
    }

    static public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(null, 204);
    }
}
