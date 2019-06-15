<?php

namespace packages\Domain\Domain\User;

class UserId
{
    private $value;

    /**
     * UserId constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
