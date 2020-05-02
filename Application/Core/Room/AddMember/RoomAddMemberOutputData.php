<?php

namespace App\Application\Core\Room\AddMember;

use App\Domain\Core\Model\Room\RoomName;
use App\Domain\Shared\Model\User\UserId;
use App\Domain\Shared\Model\User\UserName;

class RoomAddMemberOutputData
{
    /**
     * @var RoomName
     */
    private $room_name;
    /**
     * @var UserId
     */
    private $add_member_id;
    /**
     * @var UserName
     */
    private $add_member_name;

    public function __construct(RoomName $room_name, UserId $add_member_id, UserName $add_member_name)
    {
        $this->room_name = $room_name;
        $this->add_member_id = $add_member_id;
        $this->add_member_name = $add_member_name;
    }

    /**
     * @return RoomName
     */
    public function getRoomName(): RoomName
    {
        return $this->room_name;
    }

    /**
     * @return UserId
     */
    public function getAddMemberId(): UserId
    {
        return $this->add_member_id;
    }

    /**
     * @return UserName
     */
    public function getAddMemberName(): UserName
    {
        return $this->add_member_name;
    }
}