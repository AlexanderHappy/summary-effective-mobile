<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

readonly abstract class AbstractTodoController
{
    abstract function index();
    abstract function read(int $taskId);
    abstract function edit(Request $request, int $taskId);
    abstract function store(Request $request);
    abstract function destroy(int $taskId);
}
