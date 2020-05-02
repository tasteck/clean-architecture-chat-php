<?php

namespace App\Application\Authentication\User\Auth;

interface IUserAuthenticationOutputPort
{
    /**
     * @param UserAuthenticationOutputData $output_data
     * @return void
     */
    public function handle(UserAuthenticationOutputData $output_data): void ;
}