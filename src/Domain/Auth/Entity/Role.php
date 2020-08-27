<?php

namespace App\Domain\Auth\Entity;

use App\Domain\Auth\DTO\RoleDTO;
use App\Domain\Shared\Entity\AbstractDomainEntity;
use App\Infrastructure\Shared\CollectionItems;
use Doctrine\Common\Collections\Collection;

class Role extends AbstractDomainEntity
{
    /** @var string */
    protected $title;

    /** @var string */
    protected $code;

    /** @var Collection */
    protected $users;

    public function __construct()
    {
        $this->users = new CollectionItems();
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return Collection
     */
    public function getUsers(): ? Collection
    {
        return $this->users;
    }

    /**
     * @param CollectionItems $users
     */
    public function setUsers(CollectionItems $users): void
    {
        $this->users = $users;
    }

    public function addUser(User $user): void
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
        }
    }

    public function removeUser(User $user): bool
    {
        return $this->users->removeElement($user);
    }

    function getDTO(): string
    {
        return RoleDTO::class;
    }
}