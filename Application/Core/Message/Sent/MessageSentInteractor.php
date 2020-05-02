<?php

namespace App\Application\Core\Message\Sent;

use App\Application\Core\Message\Delete\Sent\IMessageSentInputPort;
use App\Application\Core\Message\Delete\Sent\MessageSentInputData;
use App\Application\Core\Message\Delete\Sent\MessageSentOutputData;
use App\Domain\Core\Model\Message\IMessageFactory;
use App\Domain\Core\Model\Message\IMessageRepository;
use App\Domain\Core\Model\Room\IRoomRepository;
use App\Domain\Core\Model\User\IUserRepository;

class MessageSentInteractor implements IMessageSentInputPort
{
    /**
     * @var IMessageFactory
     */
    private $message_factory;
    /**
     * @var IUserRepository
     */
    private $user_repository;
    /**
     * @var IRoomRepository
     */
    private $room_repository;
    /**
     * @var IMessageRepository
     */
    private $message_repository;

    public function __construct(
        IMessageFactory $message_factory,
        IMessageRepository $message_repository,
        IUserRepository $user_repository,
        IRoomRepository $room_repository
    )
    {
        $this->message_factory = $message_factory;
        $this->message_repository = $message_repository;
        $this->user_repository = $user_repository;
        $this->room_repository = $room_repository;
    }

    public function handle(MessageSentInputData $input_data): MessageSentOutputData
    {
        $room_id = $input_data->getRoomId();
        $user_id = $input_data->getUserId();
        $message_string = $input_data->getMessageString();

        $message = $this->message_factory->create($room_id, $user_id, $message_string);

        $this->message_repository->store($message);

        return new MessageSentOutputData(
            $message->getId(),
            $message->getUserId(),
            $message->getRoomId(),
            $message->getValue()
        );
    }
}