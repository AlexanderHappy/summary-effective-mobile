<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends AbstractTodoController
{
    function index()
    {
        return response()->json(
            [
                "Hello World!",
            ]
        );
    }

    function show()
    {
        // TODO: Implement show() method.
    }

    function edit()
    {
        // TODO: Implement edit() method.
    }

    function store(Request $request)
    {
        dd($request->all());
    }

    function destroy()
    {
        // TODO: Implement destroy() method.
    }
}
