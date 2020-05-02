<?php
namespace App\Domain\Core\Model\Message;

interface IMessageRepository
{
    /**
     * @param MessageId $message_id
     * @return Message
     */
    public function findById(MessageId $message_id): ?Message;

    /**
     * @param Message $message
     */
    public function store(Message $message): void;

    /**
     * @param Message $message
     */
    public function delete(Message $message): void;
}