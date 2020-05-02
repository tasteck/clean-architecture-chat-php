<?php

namespace App\Application\Authentication\User\Auth;

interface IUserAuthenticationInputPort
{
    /**
     * @param UserAuthenticationInputData $input_data
     * @return UserAuthenticationOutputData
     */
    public function handle(UserAuthenticationInputData $input_data): UserAuthenticationOutputData;
}