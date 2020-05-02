<?php

namespace App\Domain\Core\Model\Room;

use App\Domain\Core\Model\User\Exception\ArgumentNullException;
use App\Domain\Model\User\Core\Exception\ArgumentException;

class RoomName
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string $name)
    {
        if ($name === null) {
            throw new ArgumentNullException('');
        }
        if (strlen($name) < 3) {
            throw new ArgumentException('');
        }
        if (strlen($name) > 255) {
            throw new ArgumentException('');
        }
        $this->value =$name;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param RoomName $other
     * @return bool
     */
    final public function equals(self $other): bool
    {
        return $this->value === $other->getValue();
    }
}