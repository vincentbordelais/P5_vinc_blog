<?php

namespace Application\Controllers\Posts;

require_once('src/Model/post.php');
require_once('src/Lib/database.php');

use Application\Model\Post\PostRepository;
use Application\Lib\Database\DatabaseConnection;

class PostsController
{
    public function seePosts()
    {
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $posts = $postRepository->getPosts();

        require('Templates/posts.php');
    }
}
