<?php

namespace App\Validators\Repositories;

use App\Exception\Repositories\ExceptionsTasksRepositories;
use App\Models\Tasks;
use Illuminate\Support\Collection;

class ValidatorTasks
{
    /**
     * @throws ExceptionsTasksRepositories
     */
    public static function validateIndex(Collection $tasks): void
    {
        if ($tasks->isEmpty()) {
            throw new ExceptionsTasksRepositories(
                "Nothing was found in the database.",
                422
            );
        }
    }

    /**
     * @throws ExceptionsTasksRepositories
     */
    public static function validateRead(Tasks|null $task, int $id): void
    {
        if (is_null($task)) {
            throw new ExceptionsTasksRepositories(
                "Nothing was found in the database by id: " . $id . '.',
                422
            );
        }
    }
}
