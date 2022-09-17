<?php

namespace Application\Controllers\Messages;

require_once('src/Model/message.php');
require_once('src/Lib/database.php');

use Application\Model\Message\MessageRepository;
use Application\Lib\Database\DatabaseConnection;

class MessagesController
{
    public function seeMessages()
    {
        $messageRepository = new MessageRepository();
        $messageRepository->connection = new DatabaseConnection();
        $messages = $messageRepository->getMessages();

        require('Templates/adminMessages.php');
    }
}
