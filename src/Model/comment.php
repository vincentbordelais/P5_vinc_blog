<?php

namespace Application\Model\Comment;

require_once('src/Lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class Comment
{
    private string $post_id;
    private string $user_id;
    private string $comment;
    private string $creationDate;

    /**
     * Get the value of post_id
     */
    public function getPost_id()
    {
        return $this->post_id;
    }

    /**
     * Set the value of post_id
     *
     * @return  self
     */
    public function setPost_id($post_id)
    {
        $this->post_id = $post_id;

        return $this;
    }

    /**
     * Get the value of user_id
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

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
            $comment->setUser_id($row['user_id']);
            $comment->setComment($row['comment']);
            $comment->setCreationDate($row['french_creation_date']);

            $comments[] = $comment;
        }

        return $comments;
    }

    public function getUsernameFromUserId(string $id)
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT username FROM users WHERE id = ?"
        );
        $statement->execute([$id]);

        return $statement->fetch();
    }

    // public function createComment(string $post_id, string $username, string $comment)
    // {
    //     $statement = $this->connection->getConnection()->prepare(
    //         'INSERT INTO comments(post_id, username, comment, update_date,creation_date) VALUES(?, ?, ?, NOW(), NOW())'
    //     );
    //     $affectedLines = $statement->execute([$post_id, $username, $comment]);

    //     return ($affectedLines > 0);
    // }

    public function createComment(string $post_id, string $user_id, string $comment): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO comments(post_id, user_id, comment, creation_date) VALUES(?, ?, ?, NOW())'
        );
        $affectedLines = $statement->execute([$post_id, $user_id, $comment]);

        return ($affectedLines > 0);
    }

    // public function getUsername(string $user_id)
    // {
    //     $statement = $this->connection->getConnection()->prepare(
    //         "SELECT id, username FROM users WHERE id = ?"
    //     );
    //     $statement->execute([$user_id]);

    //     return $statement->fetch();
    // }

    // public function getUsername(string $user_id): array
    // {
    //     $statement = $this->connection->getConnection()->prepare(
    //         "SELECT username FROM users WHERE users.id = comments.user_id"
    //     );
    //     $statement->execute([$user_id]);

    //     $userName = $statement->fetch();

    //     return $userName;
    // }

    // public function getOwner(): array
    // {
    //   $req = $this->dbh->prepare("SELECT u.username, u.bio FROM user as u, post as p WHERE u.id = p.userID and p.id = :id");
    //   $req->bindParam(':id', $this->id);
    //   $req->execute();
    //   return $req->fetch(\PDO::FETCH_ASSOC);
    // }
}
