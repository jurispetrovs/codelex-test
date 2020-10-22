<?php

require_once 'Person.php';
require_once 'PersonStorage.php';

$personStorage = new PersonStorage('./persons.csv');

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mobile Database</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
<div class="search">
    <form action="/" method="post">
        <label for="phone-number">Phone Number</label>
        <input type="text" name="phone-number" id="phone-number">
        <button type="submit">Search</button>
    </form>
</div>
<div class="result">
    <?php if($_POST): ?>
        <h2><?= $personStorage->searchResult($_POST['phone-number']) ?></h2>
    <?php endif; ?>
</div>
</body>

</html>
