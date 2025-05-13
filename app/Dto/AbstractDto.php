<?php

namespace App\Dto;

use BadMethodCallException;

class AbstractDto
{
    public function __get(string $name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        return null;
    }
    /*
     * TODO Посмотреть можно ли от этого избавиться
     * */
    public function getPropsInArray(): array
    {
        return get_object_vars($this);
    }
}
