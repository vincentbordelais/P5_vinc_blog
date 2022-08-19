<?php
// ROUTEUR :

require_once('src/Controllers/add_comment.php');
require_once('src/Controllers/contact.php');
require_once('src/Controllers/about.php');
require_once('src/Controllers/post.php');
require_once('src/Controllers/homepage.php');

use Application\Controllers\AddComment\AddCommentController;
use Application\Controllers\HomePage\HomepageController;
use Application\Controllers\Post\PostController;

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];

                (new PostController())->execute($id);
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];

                (new AddCommentController())->execute($id, $_POST);
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        } else {
            throw new Exception('La page souhaitée n\'existe pas.');
        }
    } elseif ($_GET['page'] === "about") {
        about();
    } elseif ($_GET['page'] === "contact") {
        contact();
    } else {
        (new HomepageController())->execute();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('Templates/error.php');
}
