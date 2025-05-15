<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["message"]) && !empty($_POST["nickname"])) {
    $message = $_POST["message"];
    $nickname = $_POST["nickname"];
    $url = 'http://localhost:4567/send';


    $messageWithNickname = $nickname . ": " . $message;

    $options = [
        'http' => [
            'method'  => 'POST',
            'header'  => "Content-Type: text/plain\r\n",
            'content' => $messageWithNickname,
        ]
    ];

    $context = stream_context_create($options);
    $result = @file_get_contents($url, false, $context);

    if ($result === FALSE) {
        die("❌ Errore durante l'invio al server.");
    }
}

header("Location: index.php");
exit;
?>
