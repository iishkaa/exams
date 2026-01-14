<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "wyprawy";

$conn = new mysqli($host, $user, $password, $db);
if (!$conn){
    die("blad polaczenia z baza" . mysqli_connect_error());
}
mysqli_close($conn);
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biuro turystyczne</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<nav>
    <ul>
        <li><a href="wczasy.html">Wczasy</a></li>
        <li><a href="wycieczki.html">Wycieczki</a></li>
        <li><a href="allinclusive.html">All inclusive</a></li>
    </ul>
</nav>
<main>
    <aside>
        <h3>Twój cel wyprawy</h3>
        <form action="" method="post">
            <label> Miejsce wycieczki</label><br>
            <select name="miejsce" id="miejsce">
             <?php
             $host = "localhost";
             $user = "root";
             $password = "";
             $db = "wyprawy";

             $conn = new mysqli($host, $user, $password, $db);
             if (!$conn){
                 die("blad polaczenia z baza" . mysqli_connect_error());
             }
             $sql = "SELECT nazwa FROM miejsca ORDER BY nazwa ASC;";
             $result = $conn->query($sql);

             if ($result->num_rows > 0) {
                 while($row = mysqli_fetch_assoc($result)) {
                     echo "<option>" . $row["nazwa"] . "</option>";
                 }
             }
             else{
                 echo "0 results";
             }
             mysqli_close($conn);
             ?>
            </select>
            <label for="dorosli">Ile dorosłych?</label><br>
            <input type="number" name="dorosli" id="dorosli"><br>
            <label for="dzieci">Ile dzieci?</label><br>
            <input type="number" name="dzieci" id="dzieci"><br>
            <label for="termin">Termin</label><br>
            <input type="date" name="termin" id="termin"><br>
            <input type="submit" value="Symulacja ceny" name="button" id="button"> <!--wysyla dane do skryptu 2-->
        </form>
        <h4>Koszt wycieczki</h4>
        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "wyprawy";

        $conn = new mysqli($host, $user, $password, $db);
        if (!$conn){
            die("blad polaczenia z baza" . mysqli_connect_error());
        }
        if(isset($_POST['button'])){
            $miejsce = $_POST['miejsce'];
            $dorosli = $_POST['dorosli'];
            $dzieci = $_POST['dzieci'];
            $termin = $_POST['termin'];
            $sql = "SELECT cena FROM `miejsca` WHERE nazwa = '$miejsce';";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $cenaDzieci = $row['cena'] / 2;
            $cenaDorosli = $row['cena'];
            $cenaWycieczki = ($dorosli*$cenaDorosli) + ($dzieci*$cenaDzieci);

            echo "W dniu: $termin <br>";
            echo "$cenaWycieczki złotych<br>";

        }


        mysqli_close($conn);
        ?>
    </aside>
    <section>
        <h3>Wycieczki</h3>

        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "wyprawy";
        $conn = new mysqli($host, $user, $password, $db);
        if (!$conn){
            die("blad polaczenia z baza" . mysqli_connect_error());
        }
        $sql = "SELECT nazwa, cena, link_obraz FROM `miejsca` WHERE link_obraz LIKE '0%'; ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $linkObraz = $row['link_obraz'];
                $nazwa = $row['nazwa'];
                $cena = $row['cena'];
                echo "<div class='wycieczka'>
                        <img src='$linkObraz' alt='zdjęcie z wycieczki'>
                        <h2>$nazwa</h2>
                        <p>$cena</p>
                        </div>";
            }
        }
        mysqli_close($conn);
        ?>
    </section>
</main>
<footer>Autor: Michalina Wolna 3p_2</footer>
</body>
</html>
