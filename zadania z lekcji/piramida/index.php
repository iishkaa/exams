<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>piramida</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<section>
    <h1>Piramida - zadania z tablic</h1>
    <h2>Michalina Wolna 3p_2</h2>
    <hr>
</section>
<section>
    Program rysuje na stronie figurę w kształcie diamentu. Danymi wejściowymi są:

    wzór cegiełki - jako łańcuch znaków
    ilość cegiełek w najdłuższym rzędzie (maksymalnie 50).
</section>
<section>
    <form action="" method="post">
        <label for="symbol">Wprowadź symbol cegły:</label>
        <input type="text" value="[==]" id="symbol" name="symbol"><br>

        <label for="number">Wprowadź liczbę wierszy:</label>
        <input type="number" value="12" id="number" max="50" name="number">

        <button type="submit">Rysuj diament</button>
    </form>
</section>
<section class="diamond">
<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $symbol = $_POST['symbol'];
        $number = (int)($_POST['number']);
        if ($number < 1) $number = 1;
        if ($number > 50) $number = 50;
        $brickWidth = strlen($symbol);
        $maxWidth = $number * $brickWidth;
        echo '<pre style="font-family: monospace; line-height: 1.2;">';

        for ($i = 1; $i <= $number; $i++) {
            $row = str_repeat($symbol, $i);
            echo str_pad($row, $maxWidth, ' ', STR_PAD_BOTH);
            echo "\n";
        }
        for ($i = $number - 1; $i >= 1; $i--) {
            $row = str_repeat($symbol, $i);
            echo str_pad($row, $maxWidth, ' ', STR_PAD_BOTH);
            echo "\n";
        }
        echo '</pre>';
    }
?>
</section>
</body>
</html>
