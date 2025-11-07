<?php

namespace MCEikens\Guestbook\Domain\Model;

use Stringable;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Guest extends AbstractEntity implements Stringable
{
    protected string $firstName;
    protected string $lastName;
    protected string $email;

    /**
     * @var ObjectStorage<Comment>|null
     */
    protected ?ObjectStorage $comments = null;
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getComments(): ?ObjectStorage
    {
        return $this->comments;
    }

    public function setComments(?ObjectStorage $comments): void
    {
        $this->comments = $comments;
    }

    public function addComment(Comment $comment): void
    {
        $this->comments->attach($comment);
    }

    public function removeComment(Comment $comment): void
    {
        $this->comments->detach($comment);
    }

    public function __toString(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}