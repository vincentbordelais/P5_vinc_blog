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
            // var_dump($input['email']); //string(15) "vincent@free.fr" string(3) "aze"
            // var_dump($input['password']); // string(3) "aze"
            // var_dump(hash('sha256', $input['password'])); // string(64) "9adfb0a6d03beb7141d8ec2708d6d9fef9259d12cd230d50f70fb221ae6cabd5"

            $userRepository = new UserRepository();
            $userRepository->connection = new DatabaseConnection();
            $users = $userRepository->getUsers();
            // foreach ($users as $user) {
            //     var_dump($user->getEmail()); // string(15) "vincent@free.fr" string(14) "jerome@free.fr" string(16) "karine@gmail.com"
            //     var_dump($user->getPassword()); // string(64) "9adfb0a6d03beb7141d8ec2708d6d9fef9259d12cd230d50f70fb221ae6cabd5"
            // }
            // die();

            foreach ($users as $user) {
                if ($user->getEmail() === $input['email'] && $user->getPassword() === hash('sha256', $input['password'])) {
                    // header('Location: index.php?page=about'); // OK
                    // var_dump($user->getEmail()); // string(15) "vincent@free.fr" + Email de l'utilisateur non trouvé.
                    // var_dump($user->getRole());
                    // die();
                    $_SESSION['LOGGED_USER'] = $user->getEmail();
                    if ($user->getRole() === "Admin") {
                        $_SESSION['ROLE_ADMIN'] = "Admin";
                    }
                } else {
                    // throw new \Exception('Email de l\'utilisateur non trouvé.');
                }
            }
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }
        header('Location: index.php?page=posts');
    }

    // Uniquement pour les tests de présentation:
    public function disconnect()
    {
        session_destroy();
        header('Location: index.php?page=posts');
    }
}
