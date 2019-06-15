<?php

namespace packages\Infrastructure\User;

use Illuminate\Support\Facades\DB;
use packages\Domain\Domain\User\User;
use packages\Domain\Domain\User\UserId;
use packages\Domain\Domain\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param User $user
     * @return mixed|void
     */
    public function save(User $user)
    {
        DB::table('users')
            ->updateOrInsert(
                ['id' => $user->getId()],
                ['name' => $user->getName()]
            );
    }

    /**
     * @param UserId $id
     * @return mixed|User
     */
    public function find(UserId $id)
    {
        $user = DB::table('users')
            ->where('id', $id->getValue())
            ->first();

        return new User($id, $user->name);
    }

    /**
     * @param int $page
     * @param int $size
     * @return mixed|void
     */
    public function findByPage(int $page, int $size)
    {
        // TODO: Implement findByPage() method.
    }
}
