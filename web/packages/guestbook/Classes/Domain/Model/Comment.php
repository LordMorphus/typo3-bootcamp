<?php

namespace MCEikens\Guestbook\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Comment extends AbstractEntity
{
    protected string $headline;
    protected string $comment;
    protected string $rating;

    protected Guest $guest;

    public function getHeadline(): string
    {
        return $this->headline;
    }

    public function setHeadline(string $headline): void
    {
        $this->headline = $headline;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    public function getRating(): string
    {
        return $this->rating;
    }

    public function setRating(string $rating): void
    {
        $this->rating = $rating;
    }

    public function getGuest(): Guest
    {
        return $this->guest;
    }

    public function setGuest(Guest $guest): void
    {
        $this->guest = $guest;
    }
}