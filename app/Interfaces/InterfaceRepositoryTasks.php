<?php

namespace App\Interfaces;

use App\Dto\DtoTasks;
use Illuminate\Support\Collection;

interface InterfaceRepositoryTasks
{
    public function index(): Collection;
    public function show();
    public function edit();
    public function store(DtoTasks $dtoTasks): bool;
    public function destroy();
}
