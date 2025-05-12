<?php

namespace App\Repositories;

use App\Dto\DtoTasks;
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
            return new DtoTasks(
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
    public function show(int $id): DtoTasks
    {
        /*
         * Todo Добавить разные сообщения для index и read.
         * */
        $task = Tasks::with('status')->find($id);
        $this->validator::validateRead($task, $id);

        return new DtoTasks(
            id: $task->id,
            title: $task->title,
            description: $task->description,
            status: $task->getRelation('status')->title
        );
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function store(DtoTasks $dtoTasks): bool
    {
        return Tasks::insert([
            'title' => $dtoTasks->__get('title'),
            'description' => $dtoTasks->__get('description'),
            'status' => $dtoTasks->__get('status'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }
}
