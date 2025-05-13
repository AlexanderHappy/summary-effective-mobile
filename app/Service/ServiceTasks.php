<?php

namespace App\Service;

use App\Dto\DtoTask;
use App\Interfaces\InterfaceRepositoryTasks;
use Illuminate\Support\Collection;

readonly class ServiceTasks
{
    public function __construct(
        private InterfaceRepositoryTasks $repositoryTasks,
    )
    {
    }

    public function index(): Collection
    {
        return $this->repositoryTasks->index();
    }

    public function read(int $taskId): DtoTask
    {
        return $this->repositoryTasks->read($taskId);
    }

    public function edit(DtoTask $dtoTasks): bool
    {
        return $this->repositoryTasks->edit($dtoTasks);
    }

    public function store(DtoTask $dtoTasks): int
    {
        return $this->repositoryTasks->store(
            $dtoTasks
        );
    }

    public function destroy(int $taskId): bool
    {
        return $this->repositoryTasks->destroy($taskId);
    }
}
