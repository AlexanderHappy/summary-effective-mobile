<?php

namespace App\Interfaces;

use App\Dto\DtoTask;
use Illuminate\Support\Collection;

interface InterfaceRepositoryTasks
{
    public function index(): Collection;
    public function read(int $taskId): DtoTask;
    public function edit(DtoTask $dtoTasks);
    public function store(DtoTask $dtoTasks): int;
    public function destroy(int $taskId);
}
