<?php

namespace Octopus\Experiment;

use Octopus\Entities\Person;

class SomeCrud
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create(Person $person)
    {
        $statement = $this->db->prepare("
            INSERT INTO person (
                `firstname`,
                `lastname`,
                `created_at`
            ) VALUES (
                :firstname,
                :lastname,
                NOW()
            )
        ");

        $statement->execute([
            ':firstname' => $person->getFirstName(),
            ':lastname'  => $person->getLastName()
        ]);

        return $statement;
    }

    public function read()
    {
        $persons = $this->db->query("
            SELECT * FROM person
        ");

        return $persons;
    }

    public function readOne(int $id)
    {
        $statement = $this->db->prepare("
            SELECT * FROM person WHERE id=:id
        ");

        return $statement->execute([
            ':id' => $id
        ]);
    }

    public function update(Person $person)
    {
        $statement = $this->db->prepare("
            UPDATE person SET firstname=:firstname, lastname=:lastname, updated_at=NOW() WHERE id=:id
        ");

        return $statement->execute([
            ':firstname' => $person->getFirstName(),
            ':lastname' => $person->getLastName(),
            ':id' => $person->getId()
        ]);
    }

    public function delete($id)
    {
        $statement = $this->db->prepare("
            DELETE FROM person WHERE id=:id
        ");

        return $statement->execute([
            ':id' => $id
        ]);
    }

}