<?php

namespace App\Validators\Requests;

use App\Exception\Requests\ExceptionWrongDataTasksProvided;
use App\Models\Statuses;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidatorTasks
{
    /**
     * @throws ExceptionWrongDataTasksProvided
     */
    public static function validateStore(Request $request): void
    {
        self::validateRequest($request, [
            'title' => 'required|string|max:255',
            'description' => 'string',
            'status' => 'integer',
        ]);
    }

    /**
     * @throws ExceptionWrongDataTasksProvided
     */
    public static function validateEdit(Request $request): void
    {
        self::validateRequest($request, [
            'id' => 'required|integer',
            'title' => 'string|max:255',
            'description' => 'string',
            'status' => 'integer',
        ]);
    }

    /**
     * @throws ExceptionWrongDataTasksProvided
     */
    protected static function validateRequest(Request $request, array $rules): void
    {
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            throw new ExceptionWrongDataTasksProvided(
                $validator->errors()->first(),
                422
            );
        }
    }

    /**
     * @throws ExceptionWrongDataTasksProvided
     */
    public static function validateIdStatus(int $statusId): void
    {
        $status = Statuses::where('id', $statusId)->first();
        if (is_null($status)) {
            $statusesModel = Statuses::select('id', 'title')->get();
            $statuses = "Possible statuses -> ";
            $statusesModel->each(function ($status) use (&$statuses) {
                $statuses .= "id: " . $status->id . ", title: " . $status->title . "; ";
            });

            throw new ExceptionWrongDataTasksProvided(
                "Status not found for the provided ID. " . $statuses,
                422
            );
        }
    }
}
