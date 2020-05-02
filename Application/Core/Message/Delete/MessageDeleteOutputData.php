<?php

namespace App\Application\Core\Message\Delete;

use App\Domain\Core\Model\Message\MessageId;
use App\Domain\Core\Model\Room\RoomId;
use App\Domain\Shared\Model\User\UserId;

class MessageDeleteOutputData
{
    /**
     * @var MessageId
     */
    private $message_id;
    /**
     * @var UserId
     */
    private $user_id;
    /**
     * @var RoomId
     */
    private $room_id;

    public function __construct(MessageId $message_id, UserId $user_id, RoomId $room_id)
    {
        $this->message_id = $message_id;
        $this->user_id = $user_id;
        $this->room_id = $room_id;
    }

    /**
     * @return MessageId
     */
    public function getMessageId(): MessageId
    {
        return $this->message_id;
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
}