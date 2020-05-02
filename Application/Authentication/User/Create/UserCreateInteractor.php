<?php

namespace App\Application\Authentication\User\Create;

use App\Domain\Authentication\Model\ApiToken\IApiTokenFactory;
use App\Domain\Authentication\Service\HashedPassword;
use App\Domain\Authentication\Service\IUserFactory;
use App\Domain\Authentication\Service\IUserRepository;
use App\Domain\Authentication\Service\UserDomainService;
use App\Domain\Core\Exception\ArgumentException;

class UserCreateInteractor implements IUserCreateInputPort
{
    /**
     * @var IUserRepository
     */
    private $repository;
    /**
     * @var IUserFactory
     */
    private $factory;
    /**
     * @var IApiTokenFactory
     */
    private $token_factory;
    /**
     * @var UserDomainService
     */
    private $user_service;

    public function __construct(
        IUserRepository $user_repository,
        IUserFactory $user_factory,
        IApiTokenFactory $token_factory,
        UserDomainService $user_service
    )
    {
        $this->repository    = $user_repository;
        $this->factory       = $user_factory;
        $this->token_factory = $token_factory;
        $this->user_service  = $user_service;
    }

    /**
     * @inheritDoc
     */
    final public function handle(UserCreateInputData $input_data): UserCreateOutputData
    {
        $hashed_password = HashedPassword::createHashedPassword(
            $input_data->getRawPassword()
        );
        $api_token       = $this->token_factory->create();

        $user = $this->factory->create(
            $input_data->getUserId(),
            $hashed_password,
            $api_token
        );

        if ($this->user_service->exists($user)) {
            throw new ArgumentException('ユーザーが既に存在します。');
        }

        $this->repository->store($user);

        return new UserCreateOutputData($user->getId(), $user->getToken());
    }
}