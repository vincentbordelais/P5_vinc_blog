<?php

namespace Application\Model\User;

require_once('src/Lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class User
{
    private string $id;
    private string $username;
    private string $lastname;
    private string $firstname;
    private string $email;
    private string $password;
    private string $created_date;
    private string $role;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of created_date
     */
    public function getCreated_date()
    {
        return $this->created_date;
    }

    /**
     * Set the value of created_date
     *
     * @return  self
     */
    public function setCreated_date($created_date)
    {
        $this->created_date = $created_date;

        return $this;
    }

    /**
     * Get the value of role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
}

class UserRepository
{
    public DatabaseConnection $connection;

    public function createUser(string $username, string $lastname, string $firstname, string $email, string $password)
    {
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO users (username, last_name, first_name, email, password, created_date) VALUES(?, ?, ?, ?, ?, NOW())"
        );
        $affectedLines = $statement->execute([$username, $lastname, $firstname, $email, $password]);
        return ($affectedLines > 0);
    }

    public function getUserByEmail(string $email): ?User
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, username, password, role FROM users WHERE email = ?"
        );
        $statement->execute([$email]);

        $row = $statement->fetch();
        $user = new User();
        $user->setId($row['id']);
        $user->setUsername($row['username']);
        $user->setPassword($row['password']);
        $user->setRole($row['role']);
        return $user;
    }

    public function verifyEmail(string $email)
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM users WHERE email = ?"
        );
        $statement->execute([$email]);
        return $statement->fetch();
    }

    public function verifyUsername(string $username)
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM users WHERE username = ?"
        );
        $statement->execute([$username]);
        return $statement->fetch();
    }
}
