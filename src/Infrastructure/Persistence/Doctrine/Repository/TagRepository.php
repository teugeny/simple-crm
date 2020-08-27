<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Article\Entity\Tag;

/**
 * @method Tag|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tag|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tag[]    findAll()
 * @method Tag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class TagRepository extends AbstractRepository
{
    protected function getEntityClass(): string
    {
        return Tag::class;
    }
}