<?php

namespace App\Domain\Authentication\Service;

use App\Domain\Authentication\Model\ApiToken\ApiToken;
use App\Domain\Shared\Model\User\UserId;

/**
 * Class User
 * @package App\Domain\Authentication\User
 */
class User
{
    /**
     * @var UserId
     */
    private $id;

    /**
     * @var HashedPassword
     */
    private $hashed_password;
    /**
     * @var ApiToken
     */
    private $token;

    public function __construct(UserId $id, HashedPassword $hashed_password, ApiToken $token)
    {
        $this->id              = $id;
        $this->hashed_password = $hashed_password;
        $this->token           = $token;
    }

    /**
     * @return UserId
     */
    final public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @return HashedPassword
     */
    final public function getHashedPassword(): HashedPassword
    {
        return $this->hashed_password;
    }

    /**
     * @return ApiToken
     */
    final public function getToken(): ApiToken
    {
        return $this->token;
    }

    final public function updateToken(ApiToken $token): self
    {
        return new self(
            $this->getId(),
            $this->getHashedPassword(),
            $token
        );
    }
}