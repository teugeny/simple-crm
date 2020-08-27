<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Auth\Entity\Role;

final class RoleRepository extends AbstractRepository
{
    protected function getEntityClass(): string
    {
        return Role::class;
    }
}