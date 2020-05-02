<?php

namespace App\Application\Core\Room\Create;

use App\Domain\Core\Model\Room\RoomName;
use App\Domain\Shared\Model\User\UserId;

class RoomCreateInputData
{
    /**
     * @var UserId
     */
    private $owner_id;
    /**
     * @var RoomName
     */
    private $room_name;
    /**
     * @var array
     */
    private $members;

    public function __construct(UserId $owner_id, RoomName $room_name, array $members)
    {
        $this->owner_id = $owner_id;
        $this->room_name = $room_name;
        $this->members = $members;
    }

    /**
     * @return UserId
     */
    public function getOwnerId(): UserId
    {
        return $this->owner_id;
    }

    /**
     * @return RoomName
     */
    public function getRoomName(): RoomName
    {
        return $this->room_name;
    }

    /**
     * @return array
     */
    public function getMembers(): array
    {
        return $this->members;
    }
}