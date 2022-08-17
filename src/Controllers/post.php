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
    function execute(string $identifier)
    {
        $postRepository = new PostRepository;
        $postRepository->connection = new DatabaseConnection();
        $post = $postRepository->getPost($identifier);
        // $post = getPost($identifier);
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();;
        $comments = $commentRepository->getComments($identifier);

        require('Templates/post.php');
    }
}
