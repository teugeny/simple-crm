<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;

abstract class AbstractRepository extends ServiceEntityRepository
{
    /**
     * @var LoggerInterface
     */
    protected $logger;
    /**
     * @var ManagerRegistry
     */
    private $registry;

    /**
     * AbstractRepository constructor.
     *
     * @param ManagerRegistry $registry
     * @param LoggerInterface $logger
     */
    public function __construct(ManagerRegistry $registry, LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->registry = $registry;
        parent::__construct($registry, $this->getEntityClass());
    }

    /**
     * @param string|null $entityName
     *
     * @throws \Doctrine\Persistence\Mapping\MappingException
     */
    public function clear(string $entityName = null): void
    {
        $this->getEntityManager()->clear($entityName);
    }

    /**
     * @param $entity
     *
     * @throws \Throwable
     */
    public function save($entity): void
    {
        $em = $this->getEntityManager();
        $em->beginTransaction();

        try {
            $em->persist($entity);
            $em->flush();
            $em->commit();
        } catch (\Throwable $ex) {
            $em->rollback();
            if (!$em->isOpen()) {
                $this->registry->resetManager();
            }

            $this->logger->error($ex->getMessage(), ['ex' => $ex]);

            throw $ex;
        }
    }

    abstract protected function getEntityClass(): string;
}
