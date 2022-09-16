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
        if (isset($input['email']) && isset($input['password'])) {
            $userRepository = new UserRepository();
            $userRepository->connection = new DatabaseConnection();
            $users = $userRepository->getUsers();

            foreach ($users as $user) {
                if ($user->getEmail() === $input['email'] && $user->getPassword() === hash('sha256', $input['password'])) {
                    $_SESSION['LOGGED_USER'] = $user->getEmail();
                    if ($user->getRole() === "Admin") {
                        $_SESSION['ROLE_ADMIN'] = "Admin";
                    }
                    unset($_SESSION['errorEmailMessage']);
                    unset($_SESSION['errorPasswordMessage']);
                    header('Location: index.php?page=posts');
                } elseif ($user->getEmail() != $input['email']) {
                    $_SESSION['errorEmailMessage'] = true;
                    // header('Location: index.php?page=connection&action=seeConnection');
                } elseif ($user->getPassword() != hash('sha256', $input['password'])) {
                    $_SESSION['errorPasswordMessage'] = true;
                    // header('Location: index.php?page=connection&action=seeConnection');
                }
            }
        }
        // $userRepository = new UserRepository();
        // $userRepository->connection = new DatabaseConnection();
        // $username = $userRepository->getUsernameFromLoggedUser();
        // $_SESSION['USERNAME_LOGGED_USER'] = $username();
        // header('Location: index.php?page=posts');
    }

    // Uniquement pour les tests de présentation:
    public function disconnect()
    {
        session_destroy();
        header('Location: index.php?page=posts');
    }
}
