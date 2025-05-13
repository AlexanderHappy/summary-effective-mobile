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
        self::validateNotEmpty($tasks, "Nothing was found in the database.");
    }

    /**
     * @throws ExceptionsTasksRepositories
     */
    public static function validateFind(?Tasks $task, int $id): void
    {
        self::validateExists($task, "Nothing was found in the database by id: {$id}.");
    }

    /**
     * @throws ExceptionsTasksRepositories
     */
    public static function validateDestroy(bool $result, int $taskId): void
    {
        self::validateOperationResult(
            $result,
            "Nothing had been deleted in the database by id: {$taskId}."
        );
    }

    /**
     * @throws ExceptionsTasksRepositories
     */
    protected static function validateNotEmpty(Collection $collection, string $errorMessage): void
    {
        if ($collection->isEmpty()) {
            throw new ExceptionsTasksRepositories($errorMessage, 422);
        }
    }

    /**
     * @throws ExceptionsTasksRepositories
     */
    protected static function validateExists(?object $entity, string $errorMessage): void
    {
        if (is_null($entity)) {
            throw new ExceptionsTasksRepositories($errorMessage, 422);
        }
    }

    /**
     * @throws ExceptionsTasksRepositories
     */
    protected static function validateOperationResult(bool $result, string $errorMessage): void
    {
        if (!$result) {
            throw new ExceptionsTasksRepositories($errorMessage, 422);
        }
    }
}
