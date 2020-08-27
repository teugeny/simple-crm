<?php

namespace App\Presenter\Http\Rest\Article;

use App\UseCase\Article\GetPostDetails\GetPostDetailsInputDTO;
use App\UseCase\Article\GetPostDetails\GetPostDetailsHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PostDetailsController extends AbstractController
{
    /** @var GetPostDetailsHandler */
    protected $handler;

    public function __construct(GetPostDetailsHandler $handler)
    {
        $this->handler = $handler;
    }

    public function __invoke(Request $request)
    {
        $dto = new GetPostDetailsInputDTO();
        $dto->setId($request->get('id'));

        return $this->handler->handle($dto);
    }
}