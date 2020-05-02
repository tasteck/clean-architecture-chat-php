<?php

namespace App\Domain\Authentication\Model\ApiToken;

use App\Domain\Shared\Model\User\UserId;

Interface IApiTokenFactory
{
    public function create(): ApiToken;
}