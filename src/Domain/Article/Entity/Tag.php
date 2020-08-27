<?php

namespace App\Domain\Article\Entity;

use App\Domain\Article\DTO\TagDTO;
use App\Infrastructure\Shared\CollectionInterface;
use DateTime;
use App\Domain\Shared\Entity\AbstractDomainEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Tag extends AbstractDomainEntity
{
    /** @var string */
    protected $title;

    /** @var string */
    protected $slug;

    /** @var CollectionInterface */
    protected $posts;

    /** @var DateTime|null */
    protected $createdAt;

    /** @var DateTime|null */
    protected $updatedAt;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
        parent::__construct();
    }

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

    /**
     * @return Collection
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    /**
     * @param Collection $posts
     */
    public function setPosts(Collection $posts): void
    {
        /** @var Post $post */
        foreach ($posts as $post) {
            $post->addTag($this);
        }

        $this->posts = $posts;
    }

    /**
     * @param Post $post
     */
    public function addPost(Post $post): void
    {
        if (!$this->posts->contains($post)) {
            $post->addTag($this);
            $this->posts->add($post);
        }
    }

    /**
     * @param Post $post
     *
     * @return bool
     */
    public function removePost(Post $post): bool
    {
        $post->removeTag($this);
        return $this->posts->removeElement($post);
    }

    /**
     * @return DateTime|null
     */
    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime|null $createdAt
     */
    public function setCreatedAt(?DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return DateTime|null
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime|null $updatedAt
     */
    public function setUpdatedAt(?DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    function getDTO(): string
    {
        return TagDTO::class;
    }
}