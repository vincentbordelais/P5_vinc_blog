<?php

namespace Application\Controllers\AddMessage;

require_once('src/Model/message.php');
require_once('src/Lib/database.php');

use Application\Model\Message\MessageRepository;
use Application\Lib\Database\DatabaseConnection;

class AddMessageController
{
    public function execute(array $input)
    {
        $lastname = null;
        $firstname = null;
        $email = null;
        $message = null;

        if (!empty($input['lastname']) && !empty($input['firstname']) && !empty($input['email']) && !empty($input['message'])) {
            $lastname = $input['lastname'];
            $firstname = $input['firstname'];
            $email = $input['email'];
            $message = $input['message'];
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

        $messageRepository = new MessageRepository();
        $messageRepository->connection = new DatabaseConnection();
        $success = $messageRepository->createMessage($lastname, $firstname, $email, $message);
        if (!$success) {
            throw new \Exception('Impossible d\'enregistrer le message !');
        } else {
            header('Location: index.php?page=homepage');
        }
    }
}
