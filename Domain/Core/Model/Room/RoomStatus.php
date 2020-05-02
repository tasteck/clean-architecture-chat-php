<?php

namespace App\Domain\Core\Model\Room;

final class RoomStatus
{
    private const OPEN    = 'open';
    private const ARCHIVE = 'archive';
    /**
     * @var string
     */
    private $value;

    /**
     * RoomStatus constructor.
     * @param string $status
     */
    private function __construct(string $status)
    {
        $this->value = $status;
    }

    /**
     * @return static
     */
    public static function open(): RoomStatus
    {
        return new static(self::OPEN);
    }

    /**
     * @return static
     */
    public static function archive(): RoomStatus
    {
        return new static(self::ARCHIVE);
    }

    /**
     * @return bool
     */
    public function isArchive(): bool
    {
        return $this->value === self::ARCHIVE;
    }

    /**
     * @return bool
     */
    public function isOpen(): bool
    {
        return $this->value === self::OPEN;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    public function equals(self $value): bool
    {
        return $this->value === $value->getValue();
    }
}