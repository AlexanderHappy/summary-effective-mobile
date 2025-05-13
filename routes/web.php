<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(TasksController::class)->group(function () {
    Route::post("/tasks", "store");
    Route::get("/tasks", "index");
    Route::get("/tasks/{id}", "read");
    Route::put("/tasks/{id}", "edit");
    Route::delete("/tasks/{id}", "destroy");
});
