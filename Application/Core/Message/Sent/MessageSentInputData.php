<?php

namespace App\Application\Core\Message\Delete\Sent;

use App\Domain\Core\Model\Room\RoomId;
use App\Domain\Shared\Model\User\UserId;

class MessageSentInputData
{
    /**
     * @var RoomId
     */
    private $room_id;
    /**
     * @var UserId
     */
    private $user_id;
    /**
     * @var string
     */
    private $message_string;

    public function __construct(RoomId $room_id, UserId $user_id, string $message)
    {
        $this->room_id = $room_id;
        $this->user_id = $user_id;
        $this->message_string = $message;
    }

    /**
     * @return UserId
     */
    public function getUserId(): UserId
    {
        return $this->user_id;
    }

    /**
     * @return RoomId
     */
    public function getRoomId(): RoomId
    {
        return $this->room_id;
    }

    /**
     * @return string
     */
    public function getMessageString(): string
    {
        return $this->message_string;
    }
}