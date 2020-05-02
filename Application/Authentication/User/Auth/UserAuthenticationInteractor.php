<?php

namespace App\Application\Authentication\User\Auth;

use App\Domain\Authentication\Model\ApiToken\IApiTokenFactory;
use App\Domain\Authentication\Service\HashedPassword;
use App\Domain\Authentication\Service\IUserRepository;
use App\Domain\Core\Exception\ArgumentException;

class UserAuthenticationInteractor implements IUserAuthenticationInputPort
{
    /**
     * @var IUserRepository
     */
    private $user_repository;
    /**
     * @var IApiTokenFactory
     */
    private $token_factory;

    public function __construct(IUserRepository $repository, IApiTokenFactory $token_factory)
    {
        $this->user_repository = $repository;
        $this->token_factory = $token_factory;
    }

    /**
     * @inheritDoc
     */
    final public function handle(UserAuthenticationInputData $input_data): UserAuthenticationOutputData
    {
        $user_id = $input_data->getUserId();
        $hashed_password = HashedPassword::createHashedPassword(
            $input_data->getRawPassword()
        );

        $user = $this->user_repository->findById($user_id);

        if (!$hashed_password->equals($user->getHashedPassword())) {
            throw new ArgumentException('パスワードが違います');
        }

        $new_token = $this->token_factory->create();

        $this->user_repository->store($user->updateToken($new_token));

        return new UserAuthenticationOutputData($user->getToken());
    }
}