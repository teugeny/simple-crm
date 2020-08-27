<?php

namespace App\Application\Mapper\Provider;

use App\Application\Mapper\Contract\EntityMapperInterface;
use App\Domain\Shared\DTO\DomainDTOInterface;
use App\Domain\Shared\Entity\DomainEntityInterface;

class EntityMapper implements EntityMapperInterface
{
    public function mapFromDTO(DomainDTOInterface $dto, string $entity): DomainEntityInterface
    {
        // TODO: Implement mapFromDTO() method.
    }
}