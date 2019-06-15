<?php

namespace packages\UseCase\User\Create;

class UserCreateResponse
{
    private $createdUserId;

    /**
     * UserCreateResponse constructor.
     * @param string $createdUserId
     */
    public function __construct(string $createdUserId)
    {
        $this->createdUserId = $createdUserId;
    }

    public function getCreatedUserId(): string
    {
        return $this->createdUserId;
    }
}
