<?php

$messages = @file_get_contents('http://localhost:4567/messages');

if ($messages === false) {
    $message = "Errore con la comunicazione col server...";
    echo $message;    
} else {
    echo $messages;
}



?>
