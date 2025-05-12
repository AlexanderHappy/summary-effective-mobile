<?php

namespace App\Interfaces;

use App\Dto\DtoTask;
use Illuminate\Support\Collection;

interface InterfaceRepositoryTasks
{
    public function index(): Collection;
    public function show(int $id): DtoTask;
    public function edit();
    public function store(DtoTask $dtoTasks): bool;
    public function destroy();
}
