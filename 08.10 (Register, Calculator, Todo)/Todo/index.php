<?php

require_once 'Todo.php';
require_once 'TodoStorage.php';

$todoStorage = new TodoStorage('./todo-list.csv');

if (isset($_POST['submit'])) {
    $todoStorage->saveTodo($_POST);
}

if (isset($_POST['delete'])) {
    $todoStorage->deleteTodo($_POST['id']);
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TODO</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
<div class="parent">
    <div class="todo">
        <form action="/" method="post">
            <label for="todo">Add ToDo</label>
            <input type="text" id="todo" name="todo">
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <div class="todoList">
        <?php foreach ($todoStorage->getTodos() as $key => $todo): ?>
            <form action="/" method="post">
                <?= $todo->getTodo() ?>
                <input type="hidden" name="id" value="<?= $key ?>">
                <button type="submit" name="delete">X</button>
            </form>
        <?php endforeach; ?>
    </div>
</div>

</body>

</html>