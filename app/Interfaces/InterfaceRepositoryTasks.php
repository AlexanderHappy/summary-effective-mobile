<?php

namespace App\Interfaces;

use App\Dto\DtoTasks;

interface InterfaceRepositoryTasks
{
    public function index();
    public function show();
    public function edit();
    public function store(DtoTasks $dtoTasks): bool;
    public function destroy();
}
