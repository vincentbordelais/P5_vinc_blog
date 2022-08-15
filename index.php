<?php
// ROUTEUR :

require_once('src/Controllers/contact.php');
require_once('src/Controllers/about.php');
require_once('src/Controllers/post.php');
require_once('src/Controllers/homepage.php');

if (isset($_GET['id']) && $_GET['id'] !== '') {
    if ($_GET['action'] === 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = $_GET['id'];
            post($id);
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
