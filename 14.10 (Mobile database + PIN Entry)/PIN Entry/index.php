<?php

require_once 'Person.php';
require_once 'PersonStorage.php';

session_start();

$personStorage = new PersonStorage('./persons.csv');

if (isset($_POST['login'])) {
    $pin = $_POST['pin-code'];
    $loggedInPerson = $personStorage->getPersonByPin($pin);

    if ($loggedInPerson !== null) {
        $_SESSION['person'] = $loggedInPerson;
    }
}

if (isset($_POST['logout'])) {
    unset($_SESSION['person']);
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PIN Entry</title>
    <link rel="stylesheet" href="css/styles.css">
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

</body>

</html>