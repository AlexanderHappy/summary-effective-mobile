<?php

namespace App\Exception\Repositories;

use Exception;

class ExceptionsTasksRepositories extends Exception
{
    public function __construct($message, $code = 500)
    {
        parent::__construct($message, $code);
    }
}
