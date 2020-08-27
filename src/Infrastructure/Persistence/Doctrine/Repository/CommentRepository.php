<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Article\Entity\Comment;

/**
 * @method Comment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comment[]    findAll()
 * @method Comment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class CommentRepository extends AbstractRepository
{
    protected function getEntityClass(): string
    {
        return CommentRepository::class;
    }
}