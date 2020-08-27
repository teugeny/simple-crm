<?php

namespace App\Application\Mapper\Provider;

use App\Application\Mapper\Contract\RequestMapperInterface;
use App\Domain\Shared\Entity\DomainEntityInterface;
use Symfony\Component\HttpFoundation\Request;

class RequestMapper implements RequestMapperInterface
{
    public function mapFromRequest(Request $request): DomainEntityInterface
    {
        // TODO: Implement mapFromRequest() method.
    }
}