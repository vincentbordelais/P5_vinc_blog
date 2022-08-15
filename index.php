<?php
// ROUTEUR :

require_once('src/Controllers/add_comment.php');
require_once('src/Controllers/contact.php');
require_once('src/Controllers/about.php');
require_once('src/Controllers/post.php');
require_once('src/Controllers/homepage.php');

if (isset($_GET['action']) && $_GET['action'] !== '') {
    if ($_GET['action'] === 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $identifier = $_GET['id'];

            post($identifier);
        } else {
            echo 'Erreur : aucun identifiant de post envoyé';
            die;
        }
    } elseif ($_GET['action'] === 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $identifier = $_GET['id'];

            addComment($identifier, $_POST);
        } else {
            echo 'Erreur : aucun identifiant de post envoyé';
            die;
        }
    } else {
        echo 'Erreur 404 : La page souhaitée n\'existe pas.';
    }
} elseif ($_GET['page'] === "about") {
    about();
} elseif ($_GET['page'] === "contact") {
    contact();
} else {
    homepage();
}
