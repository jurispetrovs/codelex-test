<?php

require_once 'Person.php';
require_once 'PersonStorage.php';

if (isset($_POST['submit'])) {

    $personStorage = new PersonStorage('./persons.csv');

    $person = $personStorage->getPersonByName($_POST['name']);

    echo $person->getName() . ' | ' . $person->getAge() . ' | ' . $person->getCount();
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>API Call</title>
</head>

<body>

<form action="/" method="post">
    <label for="name">Name</label>
    <input type="text" id="name" name="name">
    <button type="submit" name="submit">Submit</button>
</form>

</body>

</html>