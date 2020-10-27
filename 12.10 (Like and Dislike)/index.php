<?php

require_once 'Picture.php';
require_once 'PicturesStorage.php';

$picturesStorage = new PicturesStorage('./pictures.csv');

if (isset($_POST['like'])) {
    $picturesStorage->getPictureByIndex($_POST['like'])->addLike();
    $picturesStorage->savePictures();
} elseif (isset($_POST['dislike'])) {
    $picturesStorage->getPictureByIndex($_POST['dislike'])->takeAwayLike();
    $picturesStorage->savePictures();
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Like/Dislike</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
<?php foreach ($picturesStorage->getPictures() as $key => $picture): ?>
    <div class="block">
        <form action="/" method="post">
            <div class="image-block">
                <img class="image" src="<?= $picture->getSource(); ?>" alt="">
            </div>
            <div class="like">
                <button type="submit" name="like" value="<?= $key ?>">Like</button>
            </div>
            <div class="dislike">
                <button type="submit" name="dislike" value="<?= $key ?>">Dislike</button>
            </div>
            <div class="likes-count">
                Likes: <?= $picture->getLikes(); ?>
            </div>

        </form>
    </div>
<?php endforeach; ?>

</body>

</html>