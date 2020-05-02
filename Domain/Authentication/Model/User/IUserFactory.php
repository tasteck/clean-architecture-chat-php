<?php

namespace App\Domain\Authentication\Service;

use App\Domain\Authentication\Model\ApiToken\ApiToken;
use App\Domain\Shared\Model\User\UserId;

Interface IUserFactory
{
    /**
     * @param UserId $id
     * @param HashedPassword $hashed_password
     * @param ApiToken $token
     * @return User
     */
    public function create(UserId $id, HashedPassword $hashed_password, ApiToken $token): User ;
}