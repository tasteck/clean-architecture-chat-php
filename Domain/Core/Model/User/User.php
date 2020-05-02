<?php

namespace App\Domain\Core\Model\User;

use App\Domain\Shared\Model\User\UserId;
use App\Domain\Shared\Model\User\UserName;

/**
 * Class User
 * @package App\Domain\Core\Model
 */
class User
{
    /**
     * @var UserId
     */
    private $id;
    /**
     * @var UserName
     */
    private $name;

    public function __construct(UserId $id, UserName $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @return UserName
     */
    public function getName(): UserName
    {
        return $this->name;
    }
}