<?php

namespace App\Application\Core\Room\Create;

use App\Domain\Core\Model\Room\RoomId;

class RoomCreateOutputData
{
    /**
     * @var RoomId
     */
    private $room_id;

    public function __construct(RoomId $room_id)
    {
        $this->room_id = $room_id;
    }

    /**
     * @return RoomId
     */
    final public function getRoomId(): RoomId
    {
        return $this->room_id;
    }
}