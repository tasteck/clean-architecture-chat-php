<?php

namespace App\Domain\Core\Services;

use App\Domain\Core\Model\Room\IRoomRepository;
use App\Domain\Core\Model\Room\Room;

class RoomService
{
    /**
     * @var IRoomRepository
     */
    private $room_repository;

    public function __construct(IRoomRepository $room_repository)
    {
        $this->room_repository = $room_repository;
    }

    /**
     * @param Room $room
     * @return bool
     */
    final public function exists(Room $room): bool
    {
        $room = $this->room_repository->findByName($room->getName());
        return $room !== null;
    }
}