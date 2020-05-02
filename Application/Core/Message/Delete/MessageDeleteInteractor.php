<?php

namespace App\Application\Core\Message\Delete;

use App\Domain\Core\Model\Message\IMessageRepository;
use http\Exception\InvalidArgumentException;

class MessageDeleteInteractor implements IMessageDeleteInputPort
{

    /**
     * @var IMessageRepository
     */
    private $message_repository;

    public function __construct(IMessageRepository $message_repository)
    {
        $this->message_repository = $message_repository;
    }

    public function handle(MessageDeleteInputData $input_data): MessageDeleteOutputData
    {
        $message = $this->message_repository->findById($input_data->getMessageId());

        if ($message === null) {
            throw new InvalidArgumentException('メッセージが見つかりません。');
        }

        $this->message_repository->delete($message);

        return new MessageDeleteOutputData($message->getId(), $message->getUserId(), $message->getRoomId());
    }
}