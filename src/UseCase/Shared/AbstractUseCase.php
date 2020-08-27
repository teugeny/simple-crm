<?php

namespace App\UseCase\Shared;

use App\Application\Mapper\MapperService;
use Psr\Log\LoggerInterface;

abstract class AbstractUseCase
{
    /** @var LoggerInterface */
    protected $logger;

    /** @var MapperService */
    protected $mapper;

    public function __construct(LoggerInterface $logger, MapperService $mapper)
    {
        $this->mapper = $mapper;
        $this->logger = $logger;
    }
}