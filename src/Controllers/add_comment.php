<?php

namespace Application\Controllers\AddComment;

require_once('src/Model/comment.php');
require_once('src/Lib/database.php');

use Application\Model\Comment\CommentRepository;
use Application\Lib\Database\DatabaseConnection;

class AddCommentController
{
    public function execute(string $post_id, array $input)
    {
        $user_id = $_SESSION['LOGGED_USERID'];
        $comment = null;
        if (isset($user_id) && !empty($input['comment'])) {
            $comment = $input['comment'];
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $success = $commentRepository->createComment($post_id, $user_id, $comment);
        if (!$success) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?page=post&action=seeOnePost&id=' . $post_id); // Redirection
        }
    }
}
