<?php

namespace App\Infrastructure\Core\Room;

use App\Domain\Core\Exception\ArgumentNullException;
use App\Domain\Core\Model\Room\Room;
use App\Domain\Core\Model\Room\RoomId;
use App\Domain\Core\Model\Room\RoomName;
use App\Domain\Core\Model\Room\IRoomRepository;
use App\Domain\Core\Model\Room\RoomStatus;
use App\Domain\Shared\Model\User\UserId;

class InMemoryRoomRepository implements IRoomRepository
{
    /**
     * @var array
     */
    private $values;

    public function __construct()
    {
        $this->values = [
            [
                'id'      => '1111',
                'name'    => 'コロナ対策班のチャットルーム',
                'status'  => 'open',
                'owner'   => 'account_id_1',
                'members' => [
                    'account_id_1',
                    'account_id_2',
                    'account_id_3'
                ]
            ],
            [
                'id'      => '2222',
                'name'    => 'やじチャットルーム',
                'status'  => 'open',
                'owner'   => 'account_id_2',
                'members' => [
                    'account_id_1',
                    'account_id_2',
                    'account_id_4'
                ]
            ]
        ];
    }

    /**
     * @param RoomId $room_id
     * @return Room|null
     */
    final public function findById(RoomId $room_id): ?Room
    {
        foreach ($this->values as $value) {
            if ($value['id'] === $room_id->getValue()) {
                $status = $value['status'] === 'open' ? RoomStatus::open() : RoomStatus::archive();
                return new Room(
                    new RoomId($value['id']),
                    new RoomName($value['name']),
                    $status,
                    new UserId($value['owner']),
                    $value['members']
                );
            }
        }

        return null;
    }

    final public function findByName(RoomName $roo_name): ?Room
    {
        foreach ($this->values as $value) {
            if ($value['name'] === $roo_name->getValue()) {
                $status = $value['status'] === 'open' ? RoomStatus::open() : RoomStatus::archive();
                return new Room(
                    new RoomId($value['id']),
                    new RoomName($value['name']),
                    $status,
                    new UserId($value['owner']),
                    $value['members']
                );
            }
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    final public function store(Room $room): void
    {
        foreach ($this->values as &$value) {
            if ($value['id'] === $room->getId()->getValue()) {
                $value['name']    = $room->getName()->getValue();
                $value['status']  = $room->getStatus()->getValue();
                $value['owner']   = $room->getOwnerId()->getValue();
                $value['members'] = $room->getMembers();
                return;
            }
        }

        $this->values[] = [
            'id'      => $room->getId()->getValue(),
            'name'    => $room->getName()->getValue(),
            'status'  => $room->getStatus()->getValue(),
            'owner'   => $room->getOwnerId()->getValue(),
            'members' => $room->getMembers()
        ];
    }
}