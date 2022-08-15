<?php

require_once('src/Model/comment.php');
require_once('src/Model/post.php');

function post(string $id)
{
    $post = getPost($id);
    $comments = getComments($id);

    require('Templates/post.php');
}
