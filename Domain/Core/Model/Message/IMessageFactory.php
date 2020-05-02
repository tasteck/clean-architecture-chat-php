<?php
namespace App\Domain\Core\Model\Message;

use App\Domain\Core\Model\Room\RoomId;
use App\Domain\Shared\Model\User\UserId;

interface IMessageFactory
{
    /**
     * @param RoomId $room_id
     * @param UserId $user_id
     * @param string $message
     * @return Message
     */
    public function create(RoomId $room_id, UserId $user_id, string $message): Message;
}