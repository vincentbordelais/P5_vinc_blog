<?php

namespace Application\Model\User;

require_once('src/Lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class User
{
    public string $role;
    public string $frenchCreationDate;
    public string $email;
    public string $firstname;
    public string $lastname;
    public string $username;
    public string $id;
}

class UserRepository
{
    public DatabaseConnection $connection;

    public function getUsername(string $id)
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, username FROM users WHERE id = ?"
        );
        $statement->execute([$id]);

        return $statement->fetch();
    }
}
