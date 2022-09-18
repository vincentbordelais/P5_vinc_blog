<?php

namespace Application\Model\Message;

require_once('src/Lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class Message
{
    private string $id;
    private string $lastname;
    private string $firstname;
    private string $email;
    private string $message;
    private string $created_date;

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
     * Get the value of message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */
    public function setMessage($message)
    {
        $this->message = $message;

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
}

class MessageRepository
{
    public DatabaseConnection $connection;

    public function createMessage(string $lastname, string $firstname, string $email, string $message)
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO messages(last_name, first_name, email, message, created_date) VALUES(?, ?, ?, ?, NOW())'
        );
        $affectedLines = $statement->execute([$lastname, $firstname, $email, $message]);
        return ($affectedLines > 0);
    }

    public function getMessages(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT id, last_name, first_name, email, message, DATE_FORMAT(created_date, '%d/%m/%Y à %Hh%imin%ss') AS french_created_date FROM messages ORDER BY created_date DESC"
        );
        $messages = [];
        while (($row = $statement->fetch())) {
            $message = new Message();
            $message->setId($row['id']);
            $message->setLastname($row['last_name']);
            $message->setFirstname($row['first_name']);
            $message->setEmail($row['email']);
            $message->setMessage($row['message']);
            $message->setCreated_date($row['french_created_date']);
            $messages[] = $message;
        }
        return $messages;
    }
}
