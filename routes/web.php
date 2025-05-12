<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(TodoController::class)->group(function () {
    Route::post("/tasks", "store");
    Route::get("/index/", "index");
    Route::post("/read/", "read");
    Route::delete("/destroy/", "destroy");
});
