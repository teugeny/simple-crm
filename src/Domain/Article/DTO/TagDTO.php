<?php

namespace App\Domain\Article\DTO;

use App\Domain\Shared\DTO\AbstractDomainDTO;

class TagDTO extends AbstractDomainDTO
{
    /** @var string */
    public $title;

    /** @var string */
    public $slug;

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

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }
}