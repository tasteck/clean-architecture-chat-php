<?php

namespace App\Application\Core\Room\Archive;

use App\Domain\Core\Model\Room\RoomId;
use App\Domain\Shared\Model\User\UserId;

Class RoomArchiveInputData
{
    /**
     * @var RoomId
     */
    private $room_id;
    /**
     * @var UserId
     */
    private $request_user_id;

    public function __construct(RoomId $room_id, UserId $request_user_id)
    {
        $this->room_id = $room_id;
        $this->request_user_id = $request_user_id;
    }

    /**
     * @return RoomId
     */
    public function getRoomId(): RoomId
    {
        return $this->room_id;
    }

    /**
     * @return UserId
     */
    public function getRequestUserId(): UserId
    {
        return $this->request_user_id;
    }
}