<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<nav>
    <?php
    for ($i = 0; $i <= 20; $i++) {
        echo "<img src='obraz.png'>";
    }
    ?>
</nav>
<section>
    <h2>Liryka</h2>
    <form action="" method="post">
        <select name="lista" id="lista">
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "biblioteka";
            $conn = mysqli_connect($host, $user, $password, $dbname);
            if (!$conn) {
                die("blad z baza danych: " . mysqli_connect_error());
            }
            $sql = "SELECT id, tytul FROM `ksiazka` WHERE gatunek = 'liryka';";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row["id"] . "'>" . $row["tytul"] . "</option>";
                }
            }
            mysqli_close($conn);
            ?>

        </select>
        <button id="one">Rezerwuj</button> <!--wysyla do skrypt3-->
        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "biblioteka";
        $conn = mysqli_connect($host, $user, $password, $dbname);
        if (!$conn) {
            die("blad z baza danych: " . mysqli_connect_error());
        }
        if(isset($_POST['one'])) {
            $id = $_POST['$row["id"]'];
            $sql = "SELECT tytul FROM `ksiazka` WHERE id = '$id';";
        }

        ?>
    </form>
</section>
<section>
    <h2>Epika</h2>
    <form action="" method="post">
        <select name="lista2" id="lista2">
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "biblioteka";
            $conn = mysqli_connect($host, $user, $password, $dbname);
            if (!$conn) {
                die("blad z baza danych: " . mysqli_connect_error());
            }
            $sql = "SELECT id, tytul FROM `ksiazka` WHERE gatunek = 'epika';";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row["id"] . "'>" . $row["tytul"] . "</option>";
                }
            }
            mysqli_close($conn);
            ?>
        </select>
        <button>Rezerwuj</button><!--wysyla do skrypt3-->
        <!--skrypt3-->
    </form>
</section>
<section>
    <h2>Dramat</h2>
    <form action="" method="post">
        <select name="lista3" id="lista3">
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "biblioteka";
            $conn = mysqli_connect($host, $user, $password, $dbname);
            if (!$conn) {
                die("blad z baza danych: " . mysqli_connect_error());
            }
            $sql = "SELECT id, tytul FROM `ksiazka` WHERE gatunek = 'dramat';";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row["id"] . "'>" . $row["tytul"] . "</option>";
                }
            }
            mysqli_close($conn);
            ?>
        </select>
        <button>Rezerwuj</button><!--wysyla do skrypt3-->
        <!--skrypt3-->
    </form>
</section>
<section>
    <h2>Zaległe książki</h2>
    <ul>
        <!--skrypt4-->
    </ul>
</section>
<footer><strong>Autor: Michalina Wolna 3p_2</strong></footer>
</body>
</html>
