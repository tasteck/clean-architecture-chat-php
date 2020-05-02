<?php

namespace App\Application\Core\Room\Create;

use App\Domain\Core\Exception\CanNotRegisterRoomException;
use App\Domain\Core\Exception\UserNotFoundException;
use App\Domain\Core\Model\Room\IRoomFactory;
use App\Domain\Core\Model\Room\IRoomRepository;
use App\Domain\Core\Model\User\IUserRepository;
use App\Domain\Core\Services\RoomService;

class RoomCreateInteractor implements IRoomCreateInputPort
{
    /**
     * @var IRoomRepository
     */
    private $room_repository;
    /**
     * @var IRoomFactory
     */
    private $room_factory;
    /**
     * @var IUserRepository
     */
    private $user_repository;
    /**
     * @var RoomService
     */
    private $room_service;

    public function __construct(IRoomFactory $room_factory, IRoomRepository $room_repository, RoomService $room_service, IUserRepository $user_repository)
    {
        $this->room_factory = $room_factory;
        $this->room_repository = $room_repository;
        $this->room_service = $room_service;
        $this->user_repository = $user_repository;
    }

    public function handle(RoomCreateInputData $input_data): RoomCreateOutputData
    {
        $owner_id = $input_data->getOwnerId();
        $owner = $this->user_repository->findById($owner_id);
        if ($owner === null) {
            throw new UserNotFoundException('ユーザーが見つかりません。');
        }

        $room = $this->room_factory->create(
            $owner_id,
            $input_data->getRoomName(),
            $input_data->getMembers()
        );

        if ($this->room_service->exists($room)) {
            throw new CanNotRegisterRoomException('サークルは既に存在しています。');
        }

        $this->room_repository->store($room);

        return new RoomCreateOutputData($room->getId());
    }
}
