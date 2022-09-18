<?php

namespace Application\Controllers\AdminPost;

require_once('src/Model/post.php');
require_once('src/Lib/database.php');

use Application\Model\Post\PostRepository;
use Application\Lib\Database\DatabaseConnection;

class AdminPostController
{
    public function seeAddForm()
    {
        require('Templates/adminAddPost.php');
    }

    public function add(array $input)
    {
        $title = null;
        $wording = null;
        $content = null;

        if (!empty($input['title']) && !empty($input['wording']) && !empty($input['content'])) {
            $title = $input['title'];
            $wording = $input['wording'];
            $content = $input['content'];
        } else {
            throw new \Exception('Les données de l\'article sont invalides.');
        }

        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $success = $postRepository->addPost($title, $wording, $content);
        if (!$success) {
            throw new \Exception('Impossible d\'ajouter l\'article !');
        } else {
            header('Location: index.php?page=posts'); // Redirection
        }
    }

    public function seeUpdateForm(string $post_id)
    {
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $post = $postRepository->getPost($post_id);
        require('Templates/adminUpdatePost.php');
    }

    public function update(string $post_id, array $input)
    {
        $title = null;
        $wording = null;
        $content = null;

        if (!empty($input['title']) && !empty($input['wording']) && !empty($input['content'])) {
            $title = $input['title'];
            $wording = $input['wording'];
            $content = $input['content'];
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

        $postRepository = new postRepository();
        $postRepository->connection = new DatabaseConnection();
        $success = $postRepository->updatePost($post_id, $title, $wording, $content);
        if (!$success) {
            throw new \Exception('Impossible de mettre à jour le commentaire !');
        } else {
            header('Location: index.php?page=post&action=seeOnePost&id=' . $post_id); // Redirection
        }
    }

    public function remove(string $post_id)
    {
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $postRepository->removePost($post_id);
        header('Location: index.php?page=posts'); // Redirection
    }
}
