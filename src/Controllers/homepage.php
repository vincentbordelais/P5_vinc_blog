<?php

namespace Application\Controllers\HomePage;

require_once('src/Model/post.php');
require_once('src/Lib/database.php');

use Application\Model\Post\PostRepository;
use Application\Lib\Database\DatabaseConnection;

class HomePageController
{
    function execute()
    {
        $postRepository = new PostRepository;
        $postRepository->connection = new DatabaseConnection();
        $posts = $postRepository->getPosts();
        // $posts = getPosts();

        require('Templates/homepage.php');
    }
}
