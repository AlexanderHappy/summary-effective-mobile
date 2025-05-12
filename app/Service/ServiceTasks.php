<?php

namespace App\Service;

use App\Dto\DtoTasks;
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
        return $this->repositoryTasks->store(
            $dtoTasks
        );
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }
}
