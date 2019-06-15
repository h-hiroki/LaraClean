<?php

namespace packages\Domain\Application\User;

use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\Domain\Domain\User\User;
use packages\Domain\Domain\User\UserId;
use packages\UseCase\User\Create\UserCreateUseCaseInterface;
use packages\UseCase\User\Create\UserCreateRequest;
use packages\UseCase\User\Create\UserCreateResponse;

class UserCreateInteractor implements UserCreateUseCaseInterface
{
    private $userRepository;

    /**
     * UserCreateInteractor constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(UserCreateRequest $request)
    {
        $userId = new UserId(uniqid());
        $createUser = new User($userId, $request->getName());
        $this->userRepository->save($createUser);

        return new UserCreateResponse($userId->getValue());
    }
}
