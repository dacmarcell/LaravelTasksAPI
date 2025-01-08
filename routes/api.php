<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('tasks', [TaskController::class, 'index']);
Route::post('tasks', [TaskController::class, 'store']);
Route::post("tasks/{id}/categories", [TaskController::class, "addCategory"]);
Route::get('tasks/{id}', [TaskController::class, 'show']);
Route::put('tasks/{id}', [TaskController::class, 'update']);
Route::delete('tasks/{id}', [TaskController::class, 'destroy']);

Route::get("categories", [CategoryController::class, "index"]);
Route::post("categories", [CategoryController::class, "store"]);
Route::get("categories/{id}", [CategoryController::class, "show"]);
Route::put("categories/{id}", [CategoryController::class, "update"]);
Route::delete("categories/{id}", [CategoryController::class, "destroy"]);
