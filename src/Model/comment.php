<?php

namespace Application\Model\Comment;

require_once('src/Lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class Comment extends CommentRepository
{
    private string $post_id;
    private string $user_id;
    private string $comment;
    private string $creation_date;
    private string $username;

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
     * Get the value of creation_date
     */
    public function getCreation_date()
    {
        return $this->creation_date;
    }

    /**
     * Set the value of creation_date
     *
     * @return  self
     */
    public function setCreation_date($creation_date)
    {
        $this->creation_date = $creation_date;

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
}

class CommentRepository
{
    public DatabaseConnection $connection;

    public function getComments(string $post_id): array
    {

        $statement = $this->connection->getConnection()->prepare(
            "SELECT users.username, user_id, comment, DATE_FORMAT(comments.creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM users INNER JOIN comments ON users.id = comments.user_id WHERE post_id = ? ORDER BY creation_date DESC"
        );

        $statement->execute([$post_id]);

        $comments = [];
        while (($row = $statement->fetch())) {
            $comment = new Comment();
            $comment->setUsername($row['username']);
            $comment->setUser_id($row['user_id']);
            $comment->setComment($row['comment']);
            $comment->setCreation_date($row['french_creation_date']);

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
