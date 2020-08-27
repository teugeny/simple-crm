<?php

namespace App\Domain\Shared\Entity;

use Ramsey\Uuid\Uuid;

abstract class AbstractDomainEntity implements DomainEntityInterface
{
    /** @var string */
    protected $id;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    abstract function getDTO(): string ;
}