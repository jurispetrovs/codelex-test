<?php

session_start();


require_once 'Safe.php';
require_once 'Pin.php';

$safe = new Safe(1234);
$pin = new Pin;

if ($_GET) {

    $_SESSION['pin'] = substr_replace($_SESSION['pin'], $_GET['num'], strlen($_SESSION['pin']), 0);
    $pin->setPin($_SESSION['pin']);

    if (strlen($_SESSION['pin']) >= $safe->getPinLength()) {
        session_destroy();
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Safe PIN</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>

<div class="lock">
    <h2><?= $safe->openSafe($pin) ?></h2>
</div>
<div class="pin">
    <h3><?= $pin->getHiddenNumCount() ?></h3>
</div>

<div class="numpad">
    <form action="/" method="get">
        <button type="submit" name="num" value="7">7</button>
        <button type="submit" name="num" value="8">8</button>
        <button type="submit" name="num" value="9">9</button>
    </form>
</div>
<div class="numpad">
    <form action="/" method="get">
        <button type="submit" name="num" value="4">4</button>
        <button type="submit" name="num" value="5">5</button>
        <button type="submit" name="num" value="6">6</button>
    </form>
</div>
<div class="numpad">
    <form action="/" method="get">
        <button type="submit" name="num" value="1">1</button>
        <button type="submit" name="num" value="2">2</button>
        <button type="submit" name="num" value="3">3</button>
    </form>
</div>

</body>

</html>