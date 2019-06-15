<?php

namespace packages\Domain\Domain\User;

interface UserRepositoryInterface
{
    /**
     * @param User $user
     * @return mixed
     */
    public function save(User $user);

    /**
     * @param UserId $id
     * @return mixed
     */
    public function find(UserId $id);

    /**
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function findByPage(int $page, int $size);
}
