<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(TasksController::class)->group(function () {
    Route::post("/tasks", "store");
    Route::get("/tasks", "index");
    Route::post("/read/", "read");
    Route::delete("/destroy/", "destroy");
});
