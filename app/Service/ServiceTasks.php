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

    public function show(int $id): DtoTask
    {
        return $this->repositoryTasks->show($id);
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function store(DtoTask $dtoTasks): bool
    {
        return $this->repositoryTasks->store(
            $dtoTasks
        );
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }
}
