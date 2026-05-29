<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<header>
    <h1>Ranking gier komputerowych</h1>
</header>
<main>
<section class="left">
    <h3>Top 5 gier w tym miesiącu</h3>
    <ul>
        <?php
            $conn = new mysqli('localhost', 'root', '', 'gry');
            if ($conn->connect_error) {
                echo "error: " . $conn->connect_error;
            }
            $sql = "SELECT nazwa, punkty FROM `gry` ORDER BY punkty DESC LIMIT 5;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li>" . $row["nazwa"] . " " . $row["punkty"] . "</li>";
                }
            }

        ?>
    </ul>
    <h3>Nasz sklep</h3>
    <a href="http://sklep.gry.pl">Tu kupisz gry</a>
    <h3>Stronę wykonał</h3>
    <p>iishkaa</p>
</section>
<section class="between">
    <?php
    $conn = new mysqli('localhost', 'root', '', 'gry');
    if ($conn->connect_error) {
        echo "error: " . $conn->connect_error;
    }
    $sql1 = "SELECT id, nazwa, zdjecie FROM `gry`;";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {
            echo "<div>";
            echo "<img src='" . $row["zdjecie"] . "' alt=" . '"' . $row["nazwa"] . '" title=' . $row["id"] . '>';
            echo "<p>" . $row["nazwa"] . "</p>";
            echo "</div>";
        }
    }

    ?>
</section>
<section class="right">
    <h3>Dodaj nową grę</h3>
    <form action="" method="post">
        <label for="nazwa">nazwa</label><br>
        <input type="text" id="nazwa" name="nazwa"><br>
        <label for="opis">opis</label><br>
        <input type="text" id="opis" name="opis"><br>
        <label for="cena">cena</label><br>
        <input type="number" id="cena" name="cena"><br>
        <label for="zdjecie">zdjęcie</label><br>
        <input type="text" id="zdjecie" name="zdjecie"><br>
        <input type="submit" value="DODAJ" id="btnDodaj">
    </form>
    <?php
    if (isset($_POST['nazwa'])) {
        $nazwa = $_POST['nazwa'];
        $opis = $_POST['opis'];
        $cena = $_POST['cena'];
        $zdjecie = $_POST['zdjecie'];
        $conn = new mysqli('localhost', 'root', '', 'gry');
        if ($conn->connect_error) {
            echo "error: " . $conn->connect_error;
        }
        $sql3 = "INSERT INTO gry(nazwa, opis, punkty, cena, zdjecie) 
         VALUES ('$nazwa', '$opis', 0, $cena, '$zdjecie')";
        $result3 = $conn->query($sql3);

    }

    ?>
</section>
</main>
<footer>
    <form action="" method="post">
        <input type="text" id="pokazOpisPole" name="pokazOpisPole">
        <input type="submit" value="Pokaż opis" id="btnOpis">
    </form>
    <?php
    if (isset($_POST['pokazOpisPole'])) {
        $id = $_POST['pokazOpisPole'];
        $conn = new mysqli('localhost', 'root', '', 'gry');
        if ($conn->connect_error) {
            echo "error: " . $conn->connect_error;
        }
        $sql2 = "SELECT nazwa, LEFT(opis,100) AS 'opis', punkty, cena FROM `gry` WHERE id = $id;";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while($row = $result2->fetch_assoc()) {
                echo "<h2>" . $row["nazwa"] . " " . $row["punkty"] . $row["cena"] . "</h2>";
                echo "<p>" . $row["opis"] . "</p>";
            }
        }
    }
    $conn->close();
    ?>
</footer>
</body>
</html>
