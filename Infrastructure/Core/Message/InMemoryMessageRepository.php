<?php

namespace App\Infrastructure\Core\Message;

use App\Domain\Core\Model\Room\RoomId;
use App\Domain\Shared\Model\User\UserId;
use App\Domain\Core\Model\Message\IMessageRepository;
use App\Domain\Core\Model\Message\Message;
use App\Domain\Core\Model\Message\MessageId;

class InMemoryMessageRepository implements IMessageRepository
{

    /**
     * @var array
     */
    private $values;

    public function __construct()
    {
        $this->values = [
            [
                'id'      => '1',
                'user_id' => 'test_user_id1',
                'room_id' => 'test_room_id1',
                'message' => 'message1',
            ],
            [
                'id'      => '2',
                'user_id' => 'test_user_id2',
                'room_id' => 'test_room_id2',
                'message' => 'message2',
            ],
            [
                'id'      => '3',
                'user_id' => 'test_user_id3',
                'room_id' => 'test_room_id3',
                'message' => 'message3',
            ]
        ];
    }

    /**
     * @inheritDoc
     */
    public function findById(MessageId $message_id): ?Message
    {
        foreach ($this->values as $value) {
            if ($value['id'] === $message_id->getValue()) {
                return new Message(
                    new MessageId($value['id']),
                    new UserId($value['user_id']),
                    new RoomId($value['room_id']),
                    $value['message']
                );
            }
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    public function store(Message $message): void
    {
        foreach ($this->values as &$value) {
            if ($value['id'] === $message->getId()->getValue()) {
                $value['user_id'] = $message->getUserId()->getValue();
                $value['room_id'] = $message->getRoomId()->getValue();
                $value['message'] = $message->getValue();
                return;
            }
        }

        $this->values[] = [
            'id'      => $message->getId()->getValue(),
            'user_id' => $message->getUserId()->getValue(),
            'room_id' => $message->getRoomId()->getValue(),
            'message' => $message->getValue()
        ];
    }

    /**
     * @inheritDoc
     */
    public function delete(Message $message): void
    {
        foreach ($this->values as $key => &$value) {
            if ($value['id'] === $message->getId()->getValue()) {
                unset($this->values[$key]);
                return;
            }
        }
    }
}