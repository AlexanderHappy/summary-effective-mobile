<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

readonly abstract class AbstractTodoController
{
    abstract function index();
    abstract function show();
    abstract function edit();
    abstract function store(Request $request);
    abstract function destroy();
}
