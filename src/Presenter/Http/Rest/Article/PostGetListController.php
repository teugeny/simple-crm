<?php

namespace App\Presenter\Http\Rest\Article;

use App\UseCase\Article\PostGetList\GetPostListHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PostGetListController extends AbstractController
{
    /** @var GetPostListHandler */
    protected $handler;

    public function __construct(GetPostListHandler $handler)
    {
        $this->handler = $handler;
    }

    public function __invoke(Request $request)
    {
        return $this->handler->handle($request);
    }
}