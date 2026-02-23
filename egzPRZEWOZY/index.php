<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "przewozy";
$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    echo"blad servera" . mysqli_connect_error();
}
$sql = "SELECT osoby.imie, osoby.nazwisko,
       osoby.telefon, zadania.zadanie, zadania.data FROM osoby JOIN zadania 
           ON osoby.id_osoba = zadania.osoba_id;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "$row[imie] $row[nazwisko], $row[telefon] $row[zadanie] $row[data]<br>";
    }
}
mysqli_close($conn);
?>
</body>
</html>
