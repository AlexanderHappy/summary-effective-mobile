<?php

namespace App\Http\Controllers;

use App\Exception\Requests\ExceptionWrongDataTasksProvided;
use App\Validators\Requests\ValidatorTasks;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoController extends AbstractTodoController
{
    public function __construct(
        private ValidatorTasks $validator,
    )
    {
    }

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

    /**
     * @throws ExceptionWrongDataTasksProvided
     */
    function store(Request $request): JsonResponse
    {
        $this->validator::validateStore($request);


        return response()->json(
            [
                "Hello World!",
            ]
        );
    }

    function destroy()
    {
        // TODO: Implement destroy() method.
    }
}
