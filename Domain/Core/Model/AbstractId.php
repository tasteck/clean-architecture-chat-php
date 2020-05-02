<?php

namespace App\Domain\Core\Model;

use App\Domain\Core\Exception\ArgumentNullException;
use App\Domain\Core\Model\Message\MessageId;

class AbstractId
{
    /**
     * @var int
     */
    private $value;

    public function __construct(string $id)
    {
        $this->value = $id;
    }

    /**
     * @return string
     */
    final public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param AbstractId $value
     * @return bool
     */
    final public function equals(self $value): bool
    {
        return $this->value === $value->getValue();
    }
}