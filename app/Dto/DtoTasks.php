<?php

namespace App\Dto;

class DtoTasks extends AbstractDto
{
    /*
     * TODO Разделить на Store и Read
     * */
    public function __construct(
        protected ?string $id = null,
        protected string $title,
        protected ?string $description = null,
        protected int|string $status,
    )
    {
    }
}
