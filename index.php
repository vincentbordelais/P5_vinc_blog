<?php
// ROUTEUR :

require_once('src/Controllers/admin_post.php');
require_once('src/Controllers/login.php');
require_once('src/Controllers/add_user.php');
require_once('src/Controllers/registration.php');
require_once('src/Controllers/connection.php');
require_once('src/Controllers/posts.php');
require_once('src/Controllers/add_comment.php');
require_once('src/Controllers/about.php');
require_once('src/Controllers/post.php');
require_once('src/Controllers/homepage.php');

use Application\Controllers\AdminPost\AdminPostController;
use Application\Controllers\Login\LoginController;
use Application\Controllers\AddUser\AddUserController;
use Application\Controllers\Posts\PostsController;
use Application\Controllers\AddComment\AddCommentController;
use Application\Controllers\Post\PostController;

try {
    if ($_GET['page'] === "posts") {
        // page Articles
        (new PostsController())->seePosts();
    } elseif ($_GET['page'] === "post") {
        if (isset($_GET['action']) && $_GET['action'] !== '') {
            if ($_GET['action'] === 'seeOnePost') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $post_id = $_GET['id'];
                    // page Article
                    (new PostController())->seeOnePost($post_id);
                } else {
                    throw new Exception('Aucun identifiant de post envoyé');
                }
            } elseif ($_GET['action'] === 'addComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $post_id = $_GET['id'];
                    (new AddCommentController())->execute($post_id, $_POST);
                } else {
                    throw new Exception('Aucun identifiant de post envoyé');
                }
            }
        }
    } elseif ($_GET['page'] === "registration") {
        if (isset($_GET['action']) && $_GET['action'] !== '') {
            if ($_GET['action'] === 'seeRegistration') {
                // page Inscription
                seeRegistration();
            } elseif ($_GET['action'] === 'addUser') {
                (new AddUserController())->execute($_POST);
            } else {
                throw new Exception('La page souhaitée n\'existe pas.');
            }
        }
    } elseif ($_GET['page'] === "connection") {
        if (isset($_GET['action']) && $_GET['action'] !== '') {
            if ($_GET['action'] === 'seeConnection') {
                // page Connexion
                seeConnection();
            } elseif ($_GET['action'] === 'login') {
                (new LoginController())->execute($_POST);
            } elseif ($_GET['action'] === "disconnect") {
                (new LoginController())->disconnect();
            } else {
                throw new Exception('La page souhaitée n\'existe pas.');
            }
        }
    } elseif ($_GET['page'] === "about") {
        // page A propos
        seeAboutPage();
    } elseif ($_GET['page'] === "adminPost") {
        if (isset($_GET['action']) && $_GET['action'] !== '') {
            // page rédaction d'un article
            if ($_GET['action'] === 'seeAddFormPost') {
                (new AdminPostController())->seeAddForm();
            } elseif ($_GET['action'] === 'seeUpdateFormPost') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $post_id = $_GET['id'];
                    (new AdminPostController())->seeUpdateForm($post_id);
                } else {
                    throw new Exception('Aucun identifiant de post envoyé');
                }
            } elseif ($_GET['action'] === 'updatePost') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $post_id = $_GET['id'];
                    (new AdminPostController())->update($post_id, $_POST);
                } else {
                    throw new Exception('Aucun identifiant de post envoyé');
                }
            } elseif ($_GET['action'] === 'deletePost') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $post_id = $_GET['id'];
                    (new AdminPostController())->remove($post_id);
                } else {
                    throw new Exception('Aucun identifiant de post envoyé');
                }
            } elseif ($_GET['action'] === 'addPost') {
                $post_id = $_GET['id'];
                (new AdminPostController())->add($_POST);
            }
        } else {
            throw new Exception('La page souhaitée n\'existe pas.');
        }
    } else {
        // page Accueil
        seeHomepage();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('Templates/error.php');
}
