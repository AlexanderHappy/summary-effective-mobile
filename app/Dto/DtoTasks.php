<?php

namespace App\Dto;

class DtoTasks extends AbstractDto
{
    public function __construct(
        protected string $title,
        protected ?string $description = null,
        protected int $status,
    )
    {
    }
}
