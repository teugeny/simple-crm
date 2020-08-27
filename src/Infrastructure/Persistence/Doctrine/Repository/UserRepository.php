<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Auth\Entity\User;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class UserRepository extends AbstractRepository
{
    protected function getEntityClass(): string
    {
        return User::class;
    }
}