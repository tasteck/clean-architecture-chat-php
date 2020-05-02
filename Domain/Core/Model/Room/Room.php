<?php

namespace App\Domain\Core\Model\Room;

use App\Domain\Core\Exception\ArgumentNullException;
use App\Domain\Core\Model\User\User;
use App\Domain\Shared\Model\User\UserId;

class Room
{
    private const MAX = 100;
    /**
     * @var RoomId
     */
    private $id;
    /**
     * @var RoomName
     */
    private $name;
    /**
     * @var RoomStatus
     */
    private $status;
    /**
     * @var UserId
     */
    private $owner_id;
    /**
     * @var UserId[]
     */
    private $members;


    public function __construct(RoomId $id, RoomName $name, RoomStatus $status, UserId $owner_id, array $members)
    {
        $this->id      = $id;
        $this->name    = $name;
        $this->status  = $status;
        $this->owner_id = $owner_id;
        $this->members = $members;
    }

    /**
     * @return RoomId
     */
    public function getId(): RoomId
    {
        return $this->id;
    }

    /**
     * @return RoomName
     */
    public function getName(): RoomName
    {
        return $this->name;
    }

    /**
     * @return RoomStatus
     */
    public function getStatus(): RoomStatus
    {
        return $this->status;
    }

    /**
     * @return UserId
     */
    public function getOwnerId(): UserId
    {
        return $this->owner_id;
    }

    public function getMembers(): array
    {
        return $this->members;
    }

    public function archive(): self
    {
        return new self(
            $this->id,
            $this->name,
            RoomStatus::archive(),
            $this->owner_id,
            $this->members
        );
    }

    /**
     * ある程度評価メソッドが多くなってくると、ドメインオブジェクトの趣旨がぼやける
     * specに切り出していく必要が出てくる
     *
     * @return bool
     */
    final public function isArchived(): bool
    {
        return $this->status->isArchive();
    }

    /**
     * @return int
     */
    final public function countMembers(): int
    {
        return count($this->members)+1;
    }

    /**
     * @param User $join_member
     * @throws ArgumentNullException
     */
    final public function join(User $join_member): void
    {
        if ($join_member === null) {
            throw new ArgumentNullException('nullやで');
        }
        if (in_array($join_member->getId()->getValue(), $this->members, true)) {
            throw new \DomainException('既にルームにおるで');
        }

        $this->members[] = $join_member->getId()->getValue();
    }

    final public function equals(self $room): bool
    {
        return $this->getId()->equals($room->getId());
    }
}