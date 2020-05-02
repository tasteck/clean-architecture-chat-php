<?php

namespace App\SQLInfrastructure\Core\User;

use App\Domain\Core\Model\User\IUserRepository;
use App\Domain\Core\Model\User\User;
use App\Domain\Shared\Model\User\UserId;
use App\Domain\Shared\Model\User\UserName;


class SQLUserRepository implements IUserRepository
{
    final public function findById(UserId $user_id): User
    {
        return new User($user_id, new UserName('hoge'));
    }
}