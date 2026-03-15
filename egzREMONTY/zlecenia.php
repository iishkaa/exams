<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Remonty</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<header><h1>Malowanie i gipsowanie</h1></header>
<main>
    <nav>
        <a href="kontakt.html">Kontakt</a>
        <a href="https://remonty.pl" target="_blank">Partnerzy</a>
    </nav>
    <aside>
        <img src="tapeta_lewa.png" alt="usługi">
        <img src="tapeta_prawa.png" alt="usługi">
        <img src="tapeta_lewa.png" alt="usługi">
    </aside>
    <section class="left">
        <h2>Dla klientów</h2>
        <form action="" method="post">
            <label for="licz_prac">Ilu co najmniej pracowników potrzebujesz?</label><br>
            <input type="number" id="licz_prac" name="licz_prac">
            <input type="submit" value="Szukaj firm" name="submit"><br>
            <?php
            if (isset($_POST['submit'])) {
                $licz_prac = $_POST['licz_prac'];
                $host = "localhost";
                $user = "root";
                $password = "";
                $dbname = "remonty";
                $conn = new mysqli($host, $user, $password, $dbname);
                if ($conn->connect_error) {
                    echo "Connection failed: " . $conn->connect_error;
                }
                $sql = "SELECT nazwa_firmy, liczba_pracownikow FROM `wykonawcy` WHERE liczba_pracownikow >= $licz_prac;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "$row[nazwa_firmy] $row[liczba_pracownikow]<br>";
                    }
                }
                mysqli_close($conn);
            }
            ?>
        </form>
    </section>
    <section class="right">
        <h2>Dla wykonawców</h2>
        <form action="" method="post">
            <select name="miasto" id="miasto">
                <?php
                    $host = "localhost";
                    $user = "root";
                    $password = "";
                    $dbname = "remonty";
                    $conn = new mysqli($host, $user, $password, $dbname);
                    if ($conn->connect_error) {
                        echo "Connection failed: " . $conn->connect_error;
                    }
                    $sql = "SELECT DISTINCT miasto FROM `klienci` ORDER BY miasto ASC;";
                    $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value=" . $row["miasto"] . ">" . $row["miasto"] . "</option>";
                    }
                }
                mysqli_close($conn);
                ?>
            </select><br>
            <input type="radio" id="malowanie" name="malCzyGips" value="malowanie" checked>
            <label for="malowanie">malowanie</label><br>
            <input type="radio" id="gipsowanie" name="malCzyGips" value="gipsowanie">
            <label for="gipsowanie">gipsowanie</label><br>
            <input type="submit" value="Szukaj klientów" name="submit2">
        </form>

        <ul>
            <?php
            if (isset($_POST['submit2'])) {
                $miasto = $_POST['miasto'];
                $rodzaj = $_POST['malCzyGips'];
                $host = "localhost";
                $user = "root";
                $password = "";
                $dbname = "remonty";
                $conn = new mysqli($host, $user, $password, $dbname);
                if ($conn->connect_error) {
                    echo "Connection failed: " . $conn->connect_error;
                }
                $sql = "SELECT klienci.imie, zlecenia.cena FROM `klienci` JOIN 
                zlecenia ON klienci.id_klienta = zlecenia.id_klienta WHERE 
                klienci.miasto = '$miasto' AND zlecenia.rodzaj = '$rodzaj';";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<li>" . $row["imie"] . " - " . $row["cena"] . "</li>";
                    }
                }
                mysqli_close($conn);

            }
            ?>
        </ul>
    </section>

</main>
<footer><strong>Stronę wykonał: Michalina Wolna 3p_2</strong></footer>
</body>
</html>
