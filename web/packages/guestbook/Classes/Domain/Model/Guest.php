<?php

namespace MCEikens\Guestbook\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Guest extends AbstractEntity
{
    protected string $firstName = '';
    protected string $lastName = '';
    protected string $email = '';

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $Email): void
    {
        $this->email = $Email;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }
}