<?php

namespace App\Application\Authentication\User\Create;

use App\Domain\Authentication\Model\ApiToken\ApiToken;
use App\Domain\Shared\Model\User\UserId;

class UserCreateOutputData
{
    /**
     * @var UserId
     */
    private $user_id;
    /**
     * @var ApiToken
     */
    private $api_token;

    public function __construct(UserId $id, ApiToken $token)
    {
        $this->user_id = $id;
        $this->api_token = $token;
    }

    /**
     * @return UserId
     */
    final public function getUserId(): UserId
    {
        return $this->user_id;
    }

    /**
     * @return ApiToken
     */
    final public function getApiToken(): ApiToken
    {
        return $this->api_token;
    }
}