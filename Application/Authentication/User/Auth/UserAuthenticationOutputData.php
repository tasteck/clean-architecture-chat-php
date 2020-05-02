<?php

namespace App\Application\Authentication\User\Auth;

use App\Domain\Authentication\Model\ApiToken\ApiToken;

class UserAuthenticationOutputData
{
    /**
     * @var ApiToken
     */
    private $token;

    public function __construct(ApiToken $token)
    {
        $this->token = $token;
    }

    /**
     * @return ApiToken
     */
    final public function getToken(): ApiToken
    {
        return $this->token;
    }
}