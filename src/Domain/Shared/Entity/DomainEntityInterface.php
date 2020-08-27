<?php

namespace App\Domain\Shared\Entity;

interface DomainEntityInterface
{
    public function getDTO(): string ;
}