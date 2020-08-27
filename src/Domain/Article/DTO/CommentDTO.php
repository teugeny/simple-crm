<?php

namespace App\Domain\Article\DTO;

use App\Domain\Auth\DTO\UserDTO;
use App\Domain\Shared\DTO\AbstractDomainDTO;

class CommentDTO extends AbstractDomainDTO
{
    /** @var UserDTO */
    public $author;

    /** @var string */
    public $message;

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
}