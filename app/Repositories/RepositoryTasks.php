<?php

namespace App\Repositories;

use App\Dto\DtoTasks;
use App\Interfaces\InterfaceRepositoryTasks;
use App\Models\Tasks;
use Illuminate\Support\Collection;

class RepositoryTasks implements InterfaceRepositoryTasks
{

    public function index(): Collection
    {
        $tasks = Tasks::with('status')->get();

        return $tasks->map(function ($task) {
            return new DtoTasks(
                id: $task->id,
                title: $task->title,
                description: $task->description,
                status: $task->getRelation('status')->title
            );
        });
    }

    public function show()
    {
        // TODO: Implement show() method.
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
