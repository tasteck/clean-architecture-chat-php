<?php

namespace App\Domain\Authentication\Service;

class HashedPassword
{
    /**
     * @var string
     */
    private $value;

    private function __construct(string $hashed_password)
    {
        $this->value = $hashed_password;
    }

    final public static function createHashedPassword(string $password): self
    {
        if (strlen($password) <= 8) {
            throw new \DomainException('8文字以上の文字列');
        }

        // todo パスワードの条件を指定

        return new self(password_hash($password, PASSWORD_ARGON2ID));
    }

    /**
     * @return string
     */
    final public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param HashedPassword $hashed_password
     * @return bool
     */
    final public function equals(self $hashed_password): bool
    {
        return $this->getValue() === $hashed_password->getValue();
    }
}