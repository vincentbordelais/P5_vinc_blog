<?php

namespace Application\Controllers\Posts;

require_once('src/Model/post.php');
require_once('src/Lib/database.php');

use Application\Model\Post\PostRepository;
use Application\Lib\Database\DatabaseConnection;

class PostsController
{
    function seePosts()
    {
        $postRepository = new PostRepository;
        $postRepository->connection = new DatabaseConnection();
        $posts = $postRepository->getPosts();

        require('Templates/posts.php');
    }
}
