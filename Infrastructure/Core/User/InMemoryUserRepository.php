<?php

namespace App\Infrastructure\Core\User;

use App\Domain\Core\Model\User\IUserRepository;
use App\Domain\Core\Model\User\User;
use App\Domain\Shared\Model\User\UserId;
use App\Domain\Shared\Model\User\UserName;

class InMemoryUserRepository implements IUserRepository
{
    /**
     * @var array
     */
    private $values;

    public function __construct()
    {
        $this->values = [
            [
                'id'   => 'account_id_1',
                'name' => 'iti'
            ],
            [
                'id'   => 'account_id_2',
                'name' => 'ni'
            ],
            [
                'id'   => 'account_id_3',
                'name' => 'san'
            ],
            [
                'id'   => 'account_id_4',
                'name' => 'yon'
            ],
            [
                'id'   => 'account_id_5',
                'name' => 'go'
            ]
        ];
    }

    final public function findById(UserId $user_id): ?User
    {
        foreach ($this->values as $value) {
            if ($value['id'] === $user_id->getValue()) {
                return new User(
                    new UserId($value['id']),
                    new UserName($value['name'])
                );
            }
        }
        return null;
    }
}