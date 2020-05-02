<?php

namespace App\Domain\Core\Model\Room;

interface IRoomRepository
{

    /**
     * @param RoomId $room_id
     * @return Room
     */
    public function findById(RoomId $room_id): ?Room;

    public function findByName(RoomName $roo_name): ?Room;

    /**
     * @param Room $room
     */
    public function store(Room $room): void;
}