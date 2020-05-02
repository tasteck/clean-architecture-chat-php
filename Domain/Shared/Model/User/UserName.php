<?php
namespace App\Domain\Shared\Model\User;

use App\Domain\Core\Exception\ArgumentNullException;
/**
 * Class UserName
 * @package App\Domain\Core\Model
 */
class UserName
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        if ($name === null) {
            throw new ArgumentNullException('NULLやん');
        }
        if ($name === '') {
            throw new \DomainException('名前ちゃうやん');
        }
        if (strlen($name) >= 25) {
            throw new \DomainException('名前ちゃうやん');
        }

        $this->name = $name;
    }

    /**
     * @return string
     */
    final public function getValue(): string
    {
        return $this->name;
    }
}