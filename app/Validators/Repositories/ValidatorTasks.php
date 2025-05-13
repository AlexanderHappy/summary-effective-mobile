<?php

namespace App\Validators\Repositories;

use App\Models\Tasks;
use Illuminate\Support\Collection;
use ValueError;

class ValidatorTasks
{
    /**
     * @throws ValueError
     */
    public static function validateIndex(Collection $tasks): void
    {
        self::validateNotEmpty($tasks, "Nothing was found in the database.");
    }

    /**
     * @throws ValueError
     */
    public static function validateFind(?Tasks $task, int $id): void
    {
        self::validateExists($task, "Nothing was found in the database by id: {$id}.");
    }

    /**
     * @throws ValueError
     */
    public static function validateDestroy(bool $result, int $taskId): void
    {
        self::validateOperationResult(
            $result,
            "Nothing had been deleted in the database by id: {$taskId}."
        );
    }

    /**
     * @throws ValueError
     */
    protected static function validateNotEmpty(Collection $collection, string $errorMessage): void
    {
        if ($collection->isEmpty()) {
            throw new ValueError($errorMessage, 422);
        }
    }

    /**
     * @throws ValueError
     */
    protected static function validateExists(?object $entity, string $errorMessage): void
    {
        if (is_null($entity)) {
            throw new ValueError($errorMessage, 422);
        }
    }

    /**
     * @throws ValueError
     */
    protected static function validateOperationResult(bool $result, string $errorMessage): void
    {
        if (!$result) {
            throw new ValueError($errorMessage, 422);
        }
    }
}
