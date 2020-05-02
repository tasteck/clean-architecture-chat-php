<?php

namespace App\Application\Core\Room\AddMember;

use App\Domain\Core\Model\Room\RoomId;
use App\Domain\Shared\Model\User\UserId;

class RoomAddMemberInputData
{
    /**
     * @var RoomId
     */
    private $room_id;
    /**
     * @var UserId
     */
    private $owner_id;
    /**
     * @var UserId
     */
    private $add_member;

    public function __construct(RoomId $room_id, UserId $owner_id, UserId $add_member)
    {
        $this->room_id = $room_id;
        $this->owner_id = $owner_id;
        $this->add_member = $add_member;
    }

    /**
     * @return RoomId
     */
    public function getRoomId(): RoomId
    {
        return $this->room_id;
    }

    public function getOwnerId(): UserId
    {
        return $this->owner_id;
    }

    /**
     * @return UserId
     */
    public function getAddMember(): UserId
    {
        return $this->add_member;
    }

}