<?php

namespace App\Domain\Article\Entity;

use App\Domain\Article\DTO\CommentDTO;
use DateTime;
use App\Domain\Auth\Entity\User;
use App\Domain\Shared\Entity\AbstractDomainEntity;

class Comment extends AbstractDomainEntity
{
    /** @var User */
    protected $author;

    /** @var string */
    protected $message;

    /** @var Post */
    protected $post;

    /** @var DateTime|null */
    protected $createdAt;

    /** @var DateTime|null */
    protected $updatedAt;

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return Post
     */
    public function getPost(): Post
    {
        return $this->post;
    }

    /**
     * @param Post $post
     */
    public function setPost(Post $post): void
    {
        $this->post = $post;
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
     * @param DateTime $updatedAt
     */
    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return DateTime|null
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    function getDTO(): string
    {
        return CommentDTO::class;
    }
}