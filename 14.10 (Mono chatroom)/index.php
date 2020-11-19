<?php

require_once 'Person.php';
require_once 'PersonsStorage.php';

require_once 'Message.php';
require_once 'MessagesStorage.php';

session_start();

$personsStorage = new PersonsStorage('./persons.csv');
$messagesStorage = new MessagesStorage('./messages.csv');

if (isset($_POST['login'])) {
    $pin = $_POST['pin-code'];
    $loggedInPerson = $personsStorage->getPersonByPin($pin);

    if ($loggedInPerson !== null) {
        $_SESSION['person'] = $loggedInPerson;
    }
}

if (isset($_POST['logout'])) {
    unset($_SESSION['person']);
}

if (isset($_POST['send-message'])) {
    $messagesStorage->saveMessage(
        $_SESSION['person']->getId(),
        $_POST['message']
    );
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mono Chatroom</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>

<div class="login">
    <form action="/" method="post">
        <?php if (isset($_SESSION['person']) === false): ?>
            <label for="pin-code">Enter PIN</label>
            <input type="text" name="pin-code" id="pin-code">
            <button type="submit" name="login">Login</button>
        <?php endif; ?>
        <?php if (isset($_SESSION['person'])): ?>
            <?= $_SESSION['person']->getName() ?>
            <button type="submit" name="logout">Logout</button>
        <?php endif; ?>
    </form>
</div>

<div class="message-form">
    <?php if (isset($_SESSION['person'])): ?>
        <form action="/" method="post">
            <label for="message">Your message: </label>
            <input type="text" name="message" id="message">
            <button type="submit" name="send-message">Send</button>
        </form>
    <?php endif; ?>
</div>

<div class="chat">
    <?php if (isset($_SESSION['person'])): ?>
        <h2>Chat</h2>
        <?php foreach ($messagesStorage->getMessages() as $message): ?>
            <p><?= $personsStorage->getPersonByMessageId($message) . ': ' . $message->getMessage(); ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

</body>

</html>