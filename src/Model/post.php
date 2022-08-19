<?php

namespace Application\Model\Post;

require_once('src/Lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class Post
{
    public string $frenchCreationDate;
    public string $content;
    public string $wording;
    public string $title;
    public string $id;
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
        $post->title = $row['title'];
        $post->wording = $row['wording'];
        $post->frenchCreationDate = $row['french_creation_date'];
        $post->content = $row['content'];
        $post->id = $row['id'];

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
            $post->title = $row['title'];
            $post->wording = $row['wording'];
            $post->frenchCreationDate = $row['french_creation_date'];
            $post->content = $row['content'];
            $post->id = $row['id'];

            $posts[] = $post;
        }

        return $posts;
    }
}
