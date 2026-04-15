<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "biblioteka";
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    echo "blad servera" . mysqli_connect_error();
}
$sql = "SELECT * FROM `ksiazki` ORDER BY RAND() LIMIT 5;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><td>$row[id]</td><td>$row[autor]</td><td>$row[tytul]</td><td>$row[kod]</td><td>$row[data_dodania]</td></tr><br>";
        echo "</table>";
    }
}
mysqli_close($conn);
