<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "opony";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT zamowienie.id_zam, zamowienie.ilosc, opony.model, opony.cena
FROM `zamowienie` JOIN opony ON zamowienie.nr_kat = opony.nr_kat ORDER BY RAND() LIMIT 1;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["id_zam"] . " " . $row["ilosc"] . " " . $row["model"] . " " . $row["cena"];
    }
}
mysqli_close($conn);
