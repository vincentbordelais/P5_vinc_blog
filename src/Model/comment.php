<?php

namespace Application\Model\Comment;

// require_once('src/Model/user.php');
require_once('src/Lib/database.php');

// use Application\Model\User\UserRepository;
use Application\Lib\Database\DatabaseConnection;

class Comment
{
    public string $user_id;
    public string $frenchCreationDate;
    public string $comment;
}

class CommentRepository
{
    public DatabaseConnection $connection;

    public function getComments(string $post_id): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, user_id, comment, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM comments WHERE post_id = ? ORDER BY creation_date DESC"
        );
        $statement->execute([$post_id]);

        $comments = [];
        while (($row = $statement->fetch())) {
            $comment = new Comment();
            $comment->user_id = $row['user_id'];
            $comment->frenchCreationDate = $row['french_creation_date'];
            $comment->comment = $row['comment'];

            $comments[] = $comment;
        }

        return $comments;
    }

    public function createComment(string $post_id, string $username, string $comment)
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO comments(post_id, username, comment, update_date,creation_date) VALUES(?, ?, ?, NOW(), NOW())'
        );
        $affectedLines = $statement->execute([$post_id, $username, $comment]);

        return ($affectedLines > 0);
    }
}
