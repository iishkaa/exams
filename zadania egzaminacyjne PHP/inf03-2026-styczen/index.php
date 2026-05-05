<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Konfigurator samochodów</title>
    <link rel="stylesheet" href="styl.css">

</head>
<body>
<header>
    <h1>Serwis konfiguracji samochodów</h1>
</header>
<nav>
    <h2>Samochody</h2>
    <h2>Konfigurator</h2>
    <h2>Kontakt</h2>
</nav>
<main>
    <section class="left">
        <table>
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "samochody";
            $conn = new mysqli($host, $user, $password, $dbname);
            if ($conn->connect_error) {
                echo "error: " . $conn->connect_error;
            }
            $sql = "SELECT pojazdy.marka, 
                    pojazdy.model ,
                    kolory.nazwa, 
                    pojazdy.cena + kolory.doplata AS cena_calkowita
                    FROM `pojazdy`
                    JOIN kolory ON pojazdy.kolor = kolory.id WHERE model = 'alfa';";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["marka"] ."</td>";
                    echo "<td>" . $row["model"] ."</td>";
                    echo "<td>" . $row["nazwa"] ."</td>";
                    echo "<td>" . $row["cena_calkowita"] ."</td>";
                    echo "</tr>";
                }
            }

            ?>
        </table>
    </section>
    <section class="between">
        <?php
        $result2 = $conn->query("SELECT marka, model, 
       cena FROM pojazdy ORDER BY RAND() LIMIT 2;");
        $row1 = $result2->fetch_assoc();
        $row2 = $result2->fetch_assoc();
        ?>
        <table>
            <tr>
                <th colspan="2">Konfiguracja</th>
                <th>Cena</th>
            </tr>
            <tr>
                <td colspan="3">
                    <img src="a1.jpg" alt="Konfiguracja 1">
                </td>

            </tr>
            <tr>
                <td>Marka</td>
                <td>
                    <?php
                        echo $row1['marka'];
                    ?>
                </td>
                <td rowspan="2">
                    <?php
                        echo $row2['cena'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Model</td>
                <td>
                    <?php
                    echo $row1['model'];
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <img src="a2.jpg" alt="Konfiguracja 2">
                </td>
            </tr>
            <tr>
                <td>Marka</td>
                <td>
                    <?php
                    echo $row2['marka'];
                    ?>
                </td>
                <td rowspan="2">
                    <?php
                    echo $row2['cena'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Model</td>
                <td>
                    <?php
                    echo $row2['model'];
                    ?>
                </td>

            </tr>
        </table>
    </section>
    <section class="right">
        <h3>111 222 444</h3>
        <img src="a3.png" alt="Samochód">
    </section>
</main>
<footer>
    <p>Stronę wykonał: xyz</p>
</footer>
<?php
$conn->close();
?>
</body>
</html>