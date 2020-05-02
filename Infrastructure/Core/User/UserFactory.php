<?php

namespace App\Infrastructure\Core\User;

use App\Domain\Authentication\Model\ApiToken\ApiToken;
use App\Domain\Authentication\Service\HashedPassword;
use App\Domain\Authentication\Service\IUserFactory;
use App\Domain\Authentication\Service\User;
use App\Domain\Shared\Model\User\UserId;

class UserFactory implements IUserFactory
{
    /**
     * @inheritDoc
     */
    final public function create(UserId $id, HashedPassword $hashed_password, ApiToken $token): User
    {
        return new User($id, $hashed_password, $token);
    }
}