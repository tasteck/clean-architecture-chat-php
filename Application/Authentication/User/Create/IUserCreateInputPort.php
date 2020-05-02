<?php

namespace App\Application\Authentication\User\Create;

interface IUserCreateInputPort
{
    /**
     * @param UserCreateInputData $input_data
     * @return UserCreateOutputData
     */
    public function handle(UserCreateInputData $input_data): UserCreateOutputData;
}