<?php

namespace App\Validators\Requests;

use App\Exception\Requests\ExceptionWrongDataTasksProvided;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidatorTasks
{
    /**
     * @throws ExceptionWrongDataTasksProvided
     */
    public static function validateStore(Request $request): void
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'string',
            'status' => 'integer',
        ]);

        if ($validator->fails()) {
            throw new ExceptionWrongDataTasksProvided(
                $validator->errors()->first(),
                422
            );
        }
    }
}
