<?php

namespace App\Application\Authentication\User\Auth;

use App\Domain\Authentication\Service\HashedPassword;
use App\Domain\Shared\Model\User\UserId;

class UserAuthenticationInputData
{
    /**
     * @var UserId
     */
    private $user_id;
    /**
     * @var string
     */
    private $raw_password;

    public function __construct(UserId $user_id, string $password)
    {
        $this->user_id      = $user_id;
        $this->raw_password = $password;
    }

    /**
     * @return UserId
     */
    final public function getUserId(): UserId
    {
        return $this->user_id;
    }

    /**
     * @return string
     */
    final public function getRawPassword(): string
    {
        return $this->raw_password;
    }
}