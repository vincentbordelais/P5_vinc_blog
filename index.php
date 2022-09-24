<?php
// ROUTEUR :

require_once('src/Controllers/messages.php');
require_once('src/Controllers/add_message.php');
require_once('src/Controllers/admin_comment.php');
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

use Application\Controllers\Messages\MessagesController;
use Application\Controllers\AddMessage\AddMessageController;
use Application\Controllers\AdminComment\AdminCommentController;
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
            } elseif ($_GET['action'] === 'validateComment') {
                if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0 && isset($_GET['post_id']) && $_GET['post_id'] > 0) {
                    $comment_id = $_GET['comment_id'];
                    $post_id = $_GET['post_id'];
                    (new AdminCommentController())->validate($comment_id, $post_id);
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé ou aucun identifiant de post envoyé');
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
        // Cette condition est inutile puisque même en tapant l'url de la route admin, la page sera vierge :
        // if (!isset($_SESSION['ROLE_ADMIN'])) {
        //     header('Location: index.php?page=homepage');
        // }
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
    } elseif ($_GET['page'] === "addMessage") {
        (new AddMessageController())->execute($_POST);
    } elseif ($_GET['page'] === "seeMessages") {
        if (!isset($_SESSION['ROLE_ADMIN'])) {
            header('Location: index.php?page=homepage');
        }
        // page Lire messages
        (new MessagesController())->seeMessages();
    } else {
        // page Accueil
        seeHomepage();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('Templates/error.php');
}
