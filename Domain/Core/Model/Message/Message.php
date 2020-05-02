<?php

namespace App\Domain\Core\Model\Message;

use App\Domain\Core\Exception\ArgumentException;
use App\Domain\Core\Exception\ArgumentNullException;
use App\Domain\Core\Model\Room\RoomId;
use App\Domain\Shared\Model\User\UserId;

/**
 * 存在しないルームへ送信するとエラーになる
 *
 * Class Message
 * @package App\Domain\Model\Message
 */
class Message
{
    private const Min = 1;
    private const Max = 255;

    /**
     * @var MessageId
     */
    private $id;
    /**
     * @var UserId
     */
    private $user_id;
    /**
     * @var RoomId
     */
    private $room_id;
    /**
     * @var string
     */
    private $message;

    /**
     * Message constructor.
     * @param MessageId $id
     * @param UserId $user_id
     * @param RoomId $room_id
     * @param string $message
     * @throws ArgumentException
     * @throws ArgumentNullException
     */
    public function __construct(MessageId $id, UserId $user_id, RoomId $room_id, string $message)
    {
//        * 投稿は1文字以上3000文字以内

        if ($message === null) {
            throw new ArgumentNullException('');
        }
        if (strlen($message) <= self::Min) {
            throw new ArgumentException('');
        }
        if (strlen($message) >= self::Max) {
            throw new ArgumentException('');
        }

        $this->id      = $id;
        $this->user_id = $user_id;
        $this->room_id = $room_id;
        $this->message = $message;
    }

    /**
     * @return MessageId
     */
    public function getId(): MessageId
    {
        return $this->id;
    }

    /**
     * @return UserId
     */
    public function getUserId(): UserId
    {
        return $this->user_id;
    }

    /**
     * @return RoomId
     */
    public function getRoomId(): RoomId
    {
        return $this->room_id;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->message;
    }
}