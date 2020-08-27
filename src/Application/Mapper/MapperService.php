<?php

namespace App\Application\Mapper;

use App\Application\Mapper\Contract\DTOMapperInterface;
use App\Application\Mapper\Contract\EntityMapperInterface;
use App\Application\Mapper\Contract\RequestMapperInterface;
use App\Domain\Shared\DTO\DomainDTOInterface;
use App\Domain\Shared\Entity\DomainEntityInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;

class MapperService
{
    /** @var DTOMapperInterface */
    protected $dtoMapper;

    /** @var EntityMapperInterface */
    protected $entityMapper;

    /** @var RequestMapperInterface */
    protected $requestMapper;

    /** @var LoggerInterface */
    protected $logger;

    public function __construct(
        DTOMapperInterface $dtoMapper,
        EntityMapperInterface $entityMapper,
        RequestMapperInterface $requestMapper
    ) {
        $this->dtoMapper     = $dtoMapper;
        $this->entityMapper  = $entityMapper;
        $this->requestMapper = $requestMapper;
    }

    public function mapFromEntity(DomainEntityInterface $entity, string $dto): DomainDTOInterface
    {
        return $this->dtoMapper->mapFromEntity($entity, $dto);
    }

    public function mapFromDTO(DomainDTOInterface $dto, string $entity): DomainEntityInterface
    {
        return $this->entityMapper->mapFromDTO($dto, $entity);
    }

    public function mapFromRequest(Request $request): DomainEntityInterface
    {
        return $this->requestMapper->mapFromRequest($request);
    }
}