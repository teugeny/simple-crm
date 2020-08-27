<?php

namespace App\Domain\Article\DTO;

use DateTime;
use App\Domain\Auth\DTO\UserDTO;
use App\Domain\Shared\DTO\AbstractDomainDTO;

class PostDTO extends AbstractDomainDTO
{
    /** @var string */
    public $title;

    /** @var string */
    public $description;

    /** @var string */
    public $details;

    /** @var UserDTO */
    public $author;

    /** @var TagDTO[] */
    public $tags;

    /** @var CommentDTO[] */
    public $comments;

    /** @var DateTime|null */
    public $createdAt;

    /** @var DateTime|null */
    public $updatedAt;

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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDetails(): string
    {
        return $this->details;
    }

    /**
     * @param string $details
     */
    public function setDetails(string $details): void
    {
        $this->details = $details;
    }

    /**
     * @return UserDTO
     */
    public function getAuthor(): UserDTO
    {
        return $this->author;
    }

    /**
     * @param UserDTO $author
     */
    public function setAuthor(UserDTO $author): void
    {
        $this->author = $author;
    }

    /**
     * @return TagDTO[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param TagDTO[] $tags
     */
    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

    /**
     * @return CommentDTO[]
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * @param CommentDTO[] $comments
     */
    public function setComments(array $comments): void
    {
        $this->comments = $comments;
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
}