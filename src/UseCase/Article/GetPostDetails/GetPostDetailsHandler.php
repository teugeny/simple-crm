<?php

namespace App\UseCase\Article\GetPostDetails;

use App\Application\Mapper\MapperService;
use App\Infrastructure\Persistence\Doctrine\Repository\PostRepository;
use App\UseCase\Shared\AbstractUseCase;
use Psr\Log\LoggerInterface;

class GetPostDetailsHandler extends AbstractUseCase
{
    /** @var PostRepository */
    protected $repository;

    public function __construct(LoggerInterface $logger, MapperService $mapper, PostRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($logger, $mapper);
    }

    public function handle(GetPostDetailsInputDTO $dto)
    {
        $post = $this->repository->find($dto->getId());

        return $this->mapper->mapFromEntity($post, GetPostDetailsOutputDTO::class);
    }
}