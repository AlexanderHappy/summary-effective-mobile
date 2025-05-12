<?php

namespace App\Repositories;

use App\Dto\DtoTasks;
use App\Interfaces\InterfaceRepositoryTasks;
use App\Models\Tasks;

class RepositoryTasks implements InterfaceRepositoryTasks
{

    public function index()
    {
        // TODO: Implement index() method.
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
