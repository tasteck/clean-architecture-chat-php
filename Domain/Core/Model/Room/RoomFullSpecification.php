<?php
namespace App\Domain\Core\Model\Room;

use App\SQLInfrastructure\Core\User\SQLUserRepository;

class RoomFullSpecification
{
    /**
     * 現状ルールが単純な為、わざわざSpecificationに切り出す必要はない
     * 例えば、Repositoryに問い合わせる必要がある時など、
     * ドメインモデルにRepositoryを渡すのはキモい
     * -> specの登場
     * が、できるだけドメイン領域でRepositoryを利用したくないので、
     * ファーストコレクションクラス(この場合だとCircleMember.php的な)
     * を作るのもあり
     *
     * @param Room $room
     * @return bool
     */
    final public function isSatisfiedBy(Room $room): bool
    {
        return $room->countMembers() >= 200;
    }

}