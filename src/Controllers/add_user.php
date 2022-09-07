<?php

namespace Application\Controllers\AddUser;

require_once('src/Model/user.php');
require_once('src/Lib/database.php');

use Application\Model\User\UserRepository;
use Application\Lib\Database\DatabaseConnection;

class AddUserController
{
    public function execute(array $input)
    {
        $username = null;
        $lastname = null;
        $firstname = null;
        $email = null;
        $password = null;
        if (!empty($input['username']) && !empty($input['lastname']) && !empty($input['firstname']) && !empty($input['email']) && !empty($input['password'])) {
            $username = $input['username'];
            $lastname = $input['lastname'];
            $firstname = $input['firstname'];
            $email = $input['email'];
            $password = $input['password'];
            $password = hash('sha256', $password);
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

        $userRepository = new UserRepository();
        $userRepository->connection = new DatabaseConnection();
        $success = $userRepository->createUser($username, $lastname, $firstname, $email, $password);
        if (!$success) {
            throw new \Exception('Impossible d\'ajouter l\'utilisateur !');
        } else {
            header('Location: index.php?page=connection&action=seeConnection'); // Redirection
        }
    }
}
