<?php

namespace Application\Controllers\Post;

require_once('src/Model/post.php');
require_once('src/Model/comment.php');
require_once('src/Lib/database.php');

use Application\Model\Post\PostRepository;
use Application\Model\Comment\CommentRepository;
use Application\Lib\Database\DatabaseConnection;

class PostController
{
    function execute(string $post_id)
    {
        $postRepository = new PostRepository;
        $postRepository->connection = new DatabaseConnection();
        $post = $postRepository->getPost($post_id);
        // $post = getPost($post_id);
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();;
        $comments = $commentRepository->getComments($post_id);

        require('Templates/post.php');
    }
}
