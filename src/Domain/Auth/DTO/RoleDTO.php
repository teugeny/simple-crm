<?php

namespace App\Domain\Auth\DTO;

use App\Domain\Shared\DTO\AbstractDomainDTO;

final class RoleDTO extends AbstractDomainDTO
{
    /** @var string */
    public $title;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }


}