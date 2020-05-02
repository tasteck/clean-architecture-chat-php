<?php

namespace App\Domain\Core\Model\Room;

use App\Domain\Shared\Model\User\UserId;

interface IRoomFactory
{
    public function create(UserId $owner_id, RoomName $room_name, array $members): Room;
}