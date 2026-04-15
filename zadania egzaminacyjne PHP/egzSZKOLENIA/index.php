<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Szkolenia i kursy</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<header><h1>SZKOLENIA</h1></header>
<main>
    <section class="left">
        <table>
            <tr><th>Kurs</th><th>Nazwa</th><th>Cena</th></tr>
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $db = "szkolenia";
            $conn = new mysqli($host, $user, $password, $db);
            if ($conn->connect_error) {
                echo "Connection failed: " . $conn->connect_error;
            }
            $sql = "SELECT kod, nazwa, cena FROM `kursy` ORDER BY cena ASC;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $kod = $row["kod"];
                    $nazwa = $row["nazwa"];
                    $cena = $row["cena"];
                    echo "<tr><td><img src='$kod.jpg' alt='kurs'></td><td>$nazwa</td><td>$cena</td></tr>";
                }
            }
            mysqli_close($conn);
            ?>
        </table>
    </section>
    <section class="right">
        <h2>Zapisy na kursy</h2>
        <label for="imie">Imie</label><br>
        <input type="text" id="imie" name="imie"><br>
        <label for="nazwisko">Nazwisko</label><br>
        <input type="text" id="nazwisko" name="nazwisko"><br>
        <label for="wiek">Wiek</label><br>
        <input type="number" id="wiek" name="wiek"><br>
        <label for="rodzaj">Rodzaj kursu</label><br>
        <select name="rodzaj" id="rodzaj"><br>
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $db = "szkolenia";
            $conn = new mysqli($host, $user, $password, $db);
            if ($conn->connect_error) {
                echo "Connection failed: " . $conn->connect_error;
            }
            $sql = "SELECT nazwa FROM `kursy`;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $kurs = $row["nazwa"];
                    echo "<option value='$kurs'>$kurs</option>";
                }
            }
            mysqli_close($conn);
            ?>
        </select><br>
        <input type="submit" name="submit" value="Dodaj dane"><br>
        <?php
        if (isset($_POST['submit'])) {
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $wiek = $_POST['wiek'];
            $rodzaj = $_POST['rodzaj'];

            $host = "localhost";
            $user = "root";
            $password = "";
            $db = "szkolenia";
            $conn = new mysqli($host, $user, $password, $db);
            if ($conn->connect_error) {
                echo "Connection failed: " . $conn->connect_error;
            }
            $sql = "INSERT INTO uczestnicy(imie, nazwisko, wiek) VALUES ($imie, $nazwisko, $wiek);";
            $result = $conn->query($sql);
            echo "<p>Dane uczestnika: $imie $nazwisko zostały dodane</p>";
            mysqli_close($conn);
        }
        echo "<p>Wprowadz wszystkie dane</p>"
        ?>
    </section>
</main>
<footer>Stronę wykonał: Michalina Wolna 3p_2</footer>
</body>
</html>
