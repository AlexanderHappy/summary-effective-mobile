<?php

namespace App\Repositories;

use App\Dto\DtoTask;
use App\Exception\Repositories\ExceptionsTasksRepositories;
use App\Interfaces\InterfaceRepositoryTasks;
use App\Models\Tasks;
use App\Validators\Repositories\ValidatorTasks;
use Illuminate\Support\Collection;

class RepositoryTasks implements InterfaceRepositoryTasks
{
    public function __construct(
       protected ValidatorTasks $validator,
    )
    {
    }

    /**
     * @throws ExceptionsTasksRepositories
     */
    public function index(): Collection
    {
        $tasks = Tasks::with('status')->get();
        $this->validator::validateIndex($tasks);

        return $tasks->map(function ($task) {
            return new DtoTask(
                id: $task->id,
                title: $task->title,
                description: $task->description,
                status: $task->getRelation('status')->title
            );
        });
    }

    /**
     * @throws ExceptionsTasksRepositories
     */
    public function read(int $taskId): DtoTask
    {
        $task = Tasks::with('status')->find($taskId);
        $this->validator::validateFind($task, $taskId);

        return new DtoTask(
            id: $task->id,
            title: $task->title,
            description: $task->description,
            status: $task->getRelation('status')->title
        );
    }

    public function edit(DtoTask $dtoTasks): bool
    {
        $task = Tasks::find($dtoTasks->__get('id'));
        $this->validator::validateFind($task, $dtoTasks->__get('id'));

        return $task->update([
            'title' => $dtoTasks->__get('title'),
            'description' => $dtoTasks->__get('description'),
            'status' => $dtoTasks->__get('status')
        ]);
    }

    public function store(DtoTask $dtoTasks): bool
    {
        return Tasks::insert([
            'title' => $dtoTasks->__get('title'),
            'description' => $dtoTasks->__get('description'),
            'status' => $dtoTasks->__get('status'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * @throws ExceptionsTasksRepositories
     */
    public function destroy(int $taskId): bool
    {
        $result = Tasks::destroy($taskId);
        $this->validator::validateDestroy($result, $taskId);

        return $result;
    }
}
