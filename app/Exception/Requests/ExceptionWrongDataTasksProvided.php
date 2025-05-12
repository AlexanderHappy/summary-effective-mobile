<?php

namespace App\Exception\Requests;

use Exception;

class ExceptionWrongDataTasksProvided extends Exception
{
    public function __construct($message, $code = 500)
    {
        parent::__construct($message, $code);
    }
}
