<?php

namespace App\Application\Core\Message\Delete\Sent;

use App\Domain\Core\Model\Room\RoomId;
use App\Domain\Shared\Model\User\UserId;
use App\Domain\Core\Model\Message\MessageId;

class MessageSentOutputData
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
    /**
     * @var string
     */
    private $message_string;

    public function __construct(MessageId $message_id, UserId $user_id, RoomId $room_id, string $message_string)
    {
        $this->message_id = $message_id;
        $this->user_id = $user_id;
        $this->room_id = $room_id;
        $this->message_string = $message_string;
    }

    /**
     * @return MessageId
     */
    public function getMessageId(): MessageId
    {
        return $this->message_id;
    }

    /**
     * @return string
     */
    public function getMessageString(): string
    {
        return $this->message_string;
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