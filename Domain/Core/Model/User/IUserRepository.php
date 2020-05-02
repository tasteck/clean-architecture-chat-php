<?php

namespace App\Domain\Core\Model\User;

use App\Domain\Shared\Model\User\UserId;

interface IUserRepository
{
    public function findById(UserId $user_id): ?User;
}