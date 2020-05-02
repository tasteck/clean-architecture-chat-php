<?php

namespace App\Application\Core\Room\AddMember;

use App\Domain\Core\Exception\ArgumentNullException;
use App\Domain\Core\Exception\RoomNotFoundException;
use App\Domain\Core\Exception\UserNotFoundException;
use App\Domain\Core\Model\Room\IRoomRepository;
use App\Domain\Core\Model\Room\RoomFullSpecification;
use App\Domain\Core\Model\User\IUserRepository;

class RoomAddMemberInteractor implements IRoomAddMemberInputPort
{
    /**
     * @var IRoomRepository
     */
    private $room_repository;

    /**
     * @var IUserRepository
     */
    private $user_repository;

    /**
     * @var RoomFullSpecification
     */
    private $spec;

    public function __construct(IRoomRepository $room_repository, RoomFullSpecification $spec, IUserRepository $user_repository)
    {
        $this->room_repository = $room_repository;
        $this->user_repository = $user_repository;
        $this->spec = $spec;
    }

    public function handle(RoomAddMemberInputData $input_data): RoomAddMemberOutputData
    {
        $room_id = $input_data->getRoomId();
        $owner_id = $input_data->getOwnerId();
        $add_member_id = $input_data->getAddMember();

        $owner = $this->user_repository->findById($owner_id);
        if ($owner === null) {
            throw new UserNotFoundException('ユーザーが見つかりません。');
        }

        $add_member = $this->user_repository->findById($add_member_id);
        if ($add_member === null) {
            throw new UserNotFoundException('ユーザーが見つかりません。');
        }

        $room = $this->room_repository->findById($room_id);
        if ($room === null) {
            throw new RoomNotFoundException('ルームが見つかりません。');
        }
        if ($this->spec->isSatisfiedBy($room)) {
            throw new \DomainException('ルームが満員です。');
        }

        try {
            $room->join($add_member);
        } catch (ArgumentNullException $exception) {
            // todo なんかする
        } catch (\DomainException $exception) {
            // todo なんかする
        }

        $this->room_repository->store($room);

        return new RoomAddMemberOutputData($room->getName(), $add_member->getId(), $add_member->getName());
    }
}
