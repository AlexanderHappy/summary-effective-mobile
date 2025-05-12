<?php

namespace App\Dto;

class DtoTasks extends AbstractDto
{
    public function __construct(
        protected ?int $id = null,
        protected string $title,
        protected ?string $description = null,
        protected int|string $status,
    ) {
    }
}
