<?php

namespace Octopus\Entities;

class Person
{
    private $id;
    private $firstName;
    private $lastName;

    public function __construct(
        int $id = 0,
        string $firstName,
        string $lastName
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }
}