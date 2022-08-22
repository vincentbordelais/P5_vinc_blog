<?php

namespace Application\Model\Post;

require_once('src/Lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class Post
{
    private string $id;
    private string $title;
    private string $wording;
    private string $content;
    private string $creationDate;
    private string $updateDate;

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
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of wording
     */
    public function getWording()
    {
        return $this->wording;
    }

    /**
     * Set the value of wording
     *
     * @return  self
     */
    public function setWording($wording)
    {
        $this->wording = $wording;

        return $this;
    }

    /**
     * Get the value of content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of creationDate
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set the value of creationDate
     *
     * @return  self
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get the value of updateDate
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * Set the value of updateDate
     *
     * @return  self
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }
}

class PostRepository
{
    public DatabaseConnection $connection;

    public function getPost(/*PostRepository $this, */string $id): Post
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, title, wording, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts WHERE id = ?"
        );
        $statement->execute([$id]);

        $row = $statement->fetch();
        $post = new Post();
        $post->setId($row['id']);
        $post->setTitle($row['title']);
        $post->setWording($row['wording']);
        $post->setContent($row['content']);
        $post->setCreationDate($row['french_creation_date']);

        return $post;
    }

    public function getPosts(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT id, title, wording, content, DATE_FORMAT(creation_date, '%d/%m/%Y') AS french_creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5"
        );
        $posts = [];
        while (($row = $statement->fetch())) {
            $post = new Post();
            $post->setId($row['id']);
            $post->setTitle($row['title']);
            $post->setWording($row['wording']);
            $post->setContent($row['content']);
            $post->setCreationDate($row['french_creation_date']);

            $posts[] = $post;
        }

        return $posts;
    }
}
