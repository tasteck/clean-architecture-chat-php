<?php

namespace App\Domain\Authentication\Service;

use App\Domain\Shared\Model\User\UserId;

interface IUserRepository
{
    /**
     * @param UserId $id
     * @return User
     */
    public function findById(UserId $id): User ;

    /**
     * @param User $user
     */
    public function store(User $user): void ;

    public function delete(User $user): void ;
}