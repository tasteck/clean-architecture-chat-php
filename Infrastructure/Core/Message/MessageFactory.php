<?php

namespace App\Infrastructure\Core\Message;

use App\Domain\Core\Model\Room\RoomId;
use App\Domain\Shared\Model\User\UserId;
use App\Domain\Core\Model\Message\IMessageFactory;
use App\Domain\Core\Model\Message\Message;
use App\Domain\Core\Model\Message\MessageId;

class MessageFactory implements IMessageFactory
{
    /**
     * @inheritDoc
     */
    public function create(RoomId $room_id, UserId $user_id, string $message): Message
    {
        return new Message(
            new MessageId(uniqid('message', true)),
            $user_id,
            $room_id,
            $message
        );
    }
}