<?php

namespace App\Domain\Authentication\Service;

/**
 * 重複チェックは$user->exists($other_user) という形は不自然
 * ドメインモデルでやると不自然な振る舞いをサービスに定義する
 * ただし何でもかんでもサービスに書かないように注意が必要
 * ->ドメインモデル貧血症を引き起こす
 * ->可能な限りドメインモデルに振る舞いを書く
 *
 * Class UserDomainService
 * @package App\Domain\Authentication\Model\User
 */
class UserDomainService
{
    /**
     * @var IUserRepository
     */
    private $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function exists(User $user): bool
    {
        $user = $this->repository->findById($user->getId());
        return $user !== null;
    }
}