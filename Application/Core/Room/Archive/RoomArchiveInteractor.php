<?php

namespace App\Application\Core\Room\Archive;

use App\Domain\Core\Exception\ArgumentException;
use App\Domain\Core\Exception\ArgumentNullException;
use App\Domain\Core\Model\Room\IRoomRepository;
use App\Domain\Core\Model\User\IUserRepository;

class RoomArchiveInteractor implements IRoomArchiveInputPort
{

    /**
     * @var IRoomRepository
     */
    private $room_repository;
    /**
     * @var IUserRepository
     */
    private $user_repository;

    public function __construct(
        IRoomRepository $room_repository,
        IUserRepository $user_repository
    )
    {
        $this->room_repository = $room_repository;
        $this->user_repository = $user_repository;
    }

    /**
     * @inheritDoc
     */
    public function handle(RoomArchiveInputData $input_data): RoomArchiveOutputData
    {
        $room = $this->room_repository->findById($input_data->getRoomId());
        if ($room === null) {
            throw new ArgumentNullException('nullやん');
        }

        $user = $this->user_repository->findById($input_data->getRequestUserId());
        if ($user === null) {
            throw new ArgumentNullException('nullやん');
        }

        if ($room->getOwnerId()->equals($input_data->getRequestUserId()) === false) {
            throw new ArgumentException('管理者ちゃうやん。');
        }

        $archived_room = $room->archive();
        $this->room_repository->store($archived_room);

        return new RoomArchiveOutputData();
    }
}