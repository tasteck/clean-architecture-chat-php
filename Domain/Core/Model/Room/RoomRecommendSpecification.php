<?php
namespace App\Domain\Core\Model\Room;

class RoomRecommendSpecification
{
    /**
     * Repositoryにロジックを記述する事を防ぐ為、
     * ここに記述してRepositoryと組み合わせる
     *
     * ここは簡単な例なので、あまり必要性はないが練習用で
     *
     * しかーし CQRSの方がいんじゃね？という疑問が湧いてくる
     * Repositoryとspecを組み合わせる手法は
     * 前検索->絞り込みという流れになる。これじゃ遅いっしょ
     * -> 複雑なクエリは[リードモデル]でしようぜ
     *
     * @param Room $room
     * @return bool
     */
    final public function isSatisfiedBy(Room $room): bool
    {
        return $room->countMembers() >= 10;
    }

}