<?php

namespace App\Application\Mapper\Contract;

use App\Domain\Shared\DTO\DomainDTOInterface;
use App\Domain\Shared\Entity\DomainEntityInterface;

interface DTOMapperInterface
{
    public function mapFromEntity(DomainEntityInterface $entity, string $dto): DomainDTOInterface;
}