<?php

require_once 'Investment.php';

if ($_POST) {
    $investment = new Investment(
        $_POST['capital'],
        $_POST['years'],
        $_POST['percent']
    );
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Investment Calculator</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
<div class="parent">
    <div class="input">
        <form action="/" method="post">
            <p><label for="capital">Investment capital</label>
                <input type="number" min="200" max="20000" value="200" id="capital" name="capital">
                <label for="years">Years</label>
                <input type="number" min="1" max="20" value="1" id="years" name="years">
                <label for="percent">Percent</label>
                <input type="number" min="4.1" max="12" step="0.1" value="4.1" id="percent" name="percent">
                <button type="submit">Submit</button>
            </p>
        </form>
    </div>

    <div class="resultForm">
        <?php if ($_POST): ?>
            <h2>Payment schedule</h2>

            <?php while ($investment->getCurrentYear() <= $investment->getYears()): ?>
                <p>
                    Year: <?= $investment->getCurrentYear() ?> |
                    Initial amount: <?= number_format($investment->getCapital(), 2) ?> |
                    Percent: <?= $investment->getPercent() ?> |
                    Final Amount: <?= number_format($investment->setCapital(), 2) ?>
                </p>
            <?php endwhile; ?>

        <?php endif; ?>
    </div>
</div>
</body>

</html>