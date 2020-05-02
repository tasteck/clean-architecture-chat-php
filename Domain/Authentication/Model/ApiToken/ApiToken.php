<?php

namespace App\Domain\Authentication\Model\ApiToken;

use App\Domain\Shared\Model\User\UserId;

class ApiToken
{
    private const MIN = 40;
    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        if ($value === null) {
            throw new \DomainException();
        }
        if (strlen($value) <= self::MIN) {
            throw new \DomainException();
        }

        $this->value = $value;
    }

    /**
     * @return string
     */
    final public function getValue(): string
    {
        return $this->value;
    }

    final public function equals(ApiToken $token): bool
    {
        return $this->getValue() === $token->getValue();
    }
}