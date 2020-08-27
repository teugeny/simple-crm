<?php

namespace App\Application\Mapper\Contract;

use App\Domain\Shared\DTO\DomainDTOInterface;
use App\Domain\Shared\Entity\DomainEntityInterface;

interface EntityMapperInterface
{
    public function mapFromDTO(DomainDTOInterface $dto, string $entity): DomainEntityInterface;
}