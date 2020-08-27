<?php

namespace App\Application\Mapper\Contract;

use App\Domain\Shared\Entity\DomainEntityInterface;
use Symfony\Component\HttpFoundation\Request;

interface RequestMapperInterface
{
    public function mapFromRequest(Request $request): DomainEntityInterface;
}