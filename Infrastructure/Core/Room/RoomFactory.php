<?php

namespace App\Infrastructure\Core\Room;

use App\Domain\Core\Exception\ArgumentNullException;
use App\Domain\Core\Model\Room\IRoomFactory;
use App\Domain\Core\Model\Room\Room;
use App\Domain\Core\Model\Room\RoomId;
use App\Domain\Core\Model\Room\RoomName;
use App\Domain\Shared\Model\User\UserId;
use App\Domain\Core\Model\Room\RoomStatus;

class RoomFactory implements IRoomFactory
{
    /**
     * @param UserId $owner_id
     * @param RoomName $room_name
     * @param array $members
     * @return Room
     */
    final public function create(UserId $owner_id, RoomName $room_name, array $members): Room
    {
        return new Room(
            new RoomId(uniqid('room', true)),
            $room_name,
            RoomStatus::open(),
            $owner_id,
            $members
        );
    }
}