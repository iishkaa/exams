<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "szkolenia";
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT kursy.nazwa, COUNT(kursy_uczestnicy.id_uczestnika) AS Zapisanych 
FROM kursy
LEFT JOIN kursy_uczestnicy
ON kursy.kod = kursy_uczestnicy.kod_kursu
GROUP BY kursy.kod, kursy.nazwa;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["nazwa"] . " " . $row["Zapisanych"] . "<br>";
    }
}
mysqli_close($conn);
