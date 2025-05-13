<?php

namespace App\Validators\Requests;

use App\Models\Statuses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use ValueError;

class ValidatorTasks
{
    /**
     * @throws ValueError
     */
    public static function validateProvidedData(Request $request): void
    {
        self::validateRequest($request, [
            'title' => 'string|max:255',
            'description' => 'string',
            'status' => 'integer|required',
        ]);
    }

    /**
     * @throws ValueError
     */
    protected static function validateRequest(Request $request, array $rules): void
    {
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            throw new ValueError(
                $validator->errors()->first(),
                422
            );
        }
    }

    /**
     * @throws ValueError
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

            throw new ValueError(
                "Status not found for the provided ID. " . $statuses,
                422
            );
        }
    }
}
