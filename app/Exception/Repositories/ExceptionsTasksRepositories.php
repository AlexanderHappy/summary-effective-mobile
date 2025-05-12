<?php

namespace App\Exception\Repositories;

use App\Exception\Requests\ExceptionWrongDataTasksProvided;
use Exception;

class ExceptionsTasksRepositories extends Exception
{
    public function __construct($message, $code = 204)
    {
        parent::__construct($message, $code);
    }
}
