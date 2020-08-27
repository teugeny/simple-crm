<?php

namespace App\UseCase\Article\PostGetList;

use App\Application\Mapper\MapperService;
use App\Infrastructure\Persistence\Doctrine\Repository\PostRepository;
use App\UseCase\Shared\AbstractUseCase;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;

class GetPostListHandler extends AbstractUseCase
{
    protected $repository;

    public function __construct(PostRepository $repository, LoggerInterface $logger, MapperService $mapper)
    {
        $this->repository = $repository;
        parent::__construct($logger, $mapper);
    }

    public function handle(Request $request)
    {
        return array_map(
            function($item) {
                return $this->mapper->mapFromEntity($item, GetPostListOutputDTO::class);
            },
            $this->repository->findAll()
        );
    }
}