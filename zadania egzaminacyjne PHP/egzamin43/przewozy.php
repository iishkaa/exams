<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Firma Przewozowa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Firma przewozowa Półdarmo</h1>
</header>
<nav>
    <a href="kw1.png">kwerenda1</a>
    <a href="kw2.png">kwerenda2</a>
    <a href="kw3.png">kwerenda3</a>
    <a href="kw4.png">kwerenda4</a>
</nav>
<main>
    <section class="left">
        <h2>Zadania do wykonania</h2>
        <table>
            <tr><th>Zadanie do wykonania</th>
                <th>Data realizacji</th>
                <th>Akcja</th>
            </tr>
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "przewozy";
            $conn = new mysqli($host, $user, $password, $dbname);
            if ($conn->connect_error) {
                echo "Connection failed: " . $conn->connect_error;
            }
            if(isset($GET['usun'])){
                $id = $GET['usun'];
                $delete = "DELETE FROM `zadania` WHERE id_zadania = $id;";
                $conn->query($delete);
            }
            $sql = "SELECT id_zadania, zadanie, data FROM `zadania`;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["zadanie"] . "</td>";
                    echo "<td>" . $row["data"] . "</td>";
                    echo "<td><a href='?usun=" . $row["id_zadania"] ."'>Usuń</a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conn);
            ?>
        </table>
        <form action="" method="post">
            <label for="zadanieDoWykonania">Zadanie do wykonania:</label>
            <input type="text" id="zadanieDoWykonania" name="zadanieDoWykonania"><br>
            <label for="dataRealizacji">Data realizacji:</label>
            <input type="date" id="dataRealizacji" name="dataRealizacji">
            <input type="submit" id="submit" name="submit" value="Dodaj">
        </form>
        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "przewozy";
        $conn = new mysqli($host, $user, $password, $dbname);
        if ($conn->connect_error) {
            echo "Connection failed: " . $conn->connect_error;
        }
        if(isset($_POST['submit'])){
            $zadanie = $_POST['zadanieDoWykonania'];
            $dataRealizacji = $_POST['dataRealizacji'];
            $sql2 = "INSERT INTO zadania (zadanie, data, osoba_id)
             VALUES ('$zadanie', '$dataRealizacji', 1)";
            $conn->query($sql2);
        }
        $conn->close();
        ?>
    </section>
    <section class="right">
        <img src="auto.png" alt="auto firmowe">
        <h3>Nasza specjalność</h3>
        <ul>
            <li>„Przeprowadzki”</li>
            <li>Przewóz mebli</li>
            <li>Przesyłki gabarytowe</li>
            <li>Wynajem pojazdów</li>
            <li>Zakupy towarów</li>
        </ul>
    </section>
</main>
<footer>
    <p>Stronę wykonał: Michalina Wolna 3p_2</p>
</footer>
</body>
</html>
