<?php

namespace Application\Controllers\AdminComment;

require_once('src/Model/comment.php');
require_once('src/Lib/database.php');

use Application\Model\Comment\CommentRepository;
use Application\Lib\Database\DatabaseConnection;

class AdminCommentController
{
    public function validate(string $comment_id, string $post_id)
    {
        $CommentRepository = new CommentRepository();
        $CommentRepository->connection = new DatabaseConnection();
        $CommentRepository->validateComment($comment_id);

        header('Location: index.php?page=post&action=seeOnePost&id=' . $post_id);
    }
}
