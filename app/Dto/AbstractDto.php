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

    public function __set(string $name, $value): void
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
            return;
        }
        throw new BadMethodCallException("Cannot set property '$name'.");
    }

    /*
     * TODO Посмотреть можно ли от этого избавиться
     * */
    public function getPropsInArray(): array
    {
        return get_object_vars($this);
    }
}
