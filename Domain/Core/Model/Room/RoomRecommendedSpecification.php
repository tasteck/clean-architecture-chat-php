<?php

namespace App\Domain\Core\Model\Room;

/**
 * おすすめルームの仕様
 * これはクエリモデルで解決する問題にしてみよ
 * Class RoomRecommendedSpecification
 * @package App\Domain\Model\Room\Specification
 */
class RoomRecommendedSpecification
{
    public function __construct()
    {
    }

    /**
     * @param Room $room
     * @return bool
     */
    final public function isSatisfiedBy(Room $room): bool
    {
        return $room->countMembers() >= 1000;
    }
}