<?php

namespace Application\Controllers\Login;

session_start();

require_once('src/Model/user.php');
require_once('src/Lib/database.php');

use Application\Model\User\UserRepository;
use Application\Lib\Database\DatabaseConnection;

class LoginController
{
    public function execute(array $input)
    {
        $email = $input['email'];
        $password = hash('sha256', $input['password']);

        $userRepository = new UserRepository();
        $userRepository->connection = new DatabaseConnection();

        if ($userRepository->verifyEmail($email) === false) {
            $_SESSION['errorMessage'] = "Cet email n'a pas encore de compte";
            header('Location: index.php?page=connection&action=seeConnection');
        } else {
            if (isset($email) && isset($password)) {
                $user = $userRepository->getUserByEmail($email);
                if ($password != $user->getPassword()) {
                    $_SESSION['errorMessage'] = "Mot de passe incorrect";
                    header('Location: index.php?page=connection&action=seeConnection');
                } else {
                    $_SESSION['LOGGED_USER'] = $user->getUsername();
                    if ($user->getRole() === "Admin") {
                        $_SESSION['ROLE_ADMIN'] = "Admin";
                    }
                    header('Location: index.php?page=posts');
                }
            }
        }
    }

    // Uniquement pour les tests de présentation:
    public function disconnect()
    {
        session_destroy();
        header('Location: index.php?page=posts');
    }
}
