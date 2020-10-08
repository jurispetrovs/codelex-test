<?php

require_once 'Person.php';
require_once 'PersonStorage.php';

$personStorage = new PersonStorage();

if (isset($_POST['submit'])) {
    $submitResult = $personStorage->getByPersonCode($_POST);
}

if (isset($_POST['search'])) {
    $searchResult = $personStorage->searchPerson($_POST['personCode']);
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Person Register</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>

<div class="parent">
    <div class="personForm">
        <form action="/" method="post">
            <p><label for="name">Name</label>
            <input type="text" id="name" name="name"></p>
            <p><label for="surname">Surname</label>
            <input type="text" id="surname" name="surname"></p>
            <p><label for="personCode">Person code</label>
            <input type="text" id="personCode" name="personCode"></p>
            <p><label for="address">Address</label>
            <input type="text" id="address" name="address"></p>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <div class="resultForm">
        <?php if (isset($_POST['search'])): ?>
        <h1><?= $searchResult ?></h1>
        <?php endif; ?>

        <?php if (isset($_POST['submit'])): ?>
            <h1><?= $submitResult ?></h1>
        <?php endif; ?>

    </div>

    <div class="searchForm">
        <form action="/" method="post">
            <p><label for="personCode">Person code</label>
            <input type="text" id="personCode" name="personCode">
            <button type="submit" name="search">Search</button></p>
        </form>
    </div>
</div>

</body>

</html>
