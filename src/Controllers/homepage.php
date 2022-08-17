<?php

require_once('src/Model/post.php');
require_once('src/Lib/database.php');

function homepage()
{
    $postRepository = new PostRepository;
    $postRepository->connection = new DatabaseConnection();
    $posts = $postRepository->getPosts();
    // $posts = getPosts();

    require('Templates/homepage.php');
}
