<?php

namespace Application\Lib\Database;

class DatabaseConnection
{
    public ?\PDO $database = null; // $database est soit PdO, soit null

    public function getConnection(): \PDO
    {
        if ($this->database === null) {
            $this->database = new \PDO('mysql:host=localhost;dbname=vinc_blog;charset=utf8', 'root', '');
        }

        return $this->database;
    }
}
