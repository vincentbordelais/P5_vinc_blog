<?php

require_once('src/Model/post.php');

function homepage()
{
    $posts = getPosts();

    require('Templates/homepage.php');
}
