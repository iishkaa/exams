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
$database = "remonty";
$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    echo "blad servera" . mysqli_connect_error();
}
$sql = "SELECT klienci.imie, zlecenia.cena FROM klienci JOIN zlecenia ON klienci.id_klienta = 
                                                                 zlecenia.id_klienta WHERE zlecenia.rodzaj = 'malowanie' 
                                                                AND klienci.miasto = 'Poznań' ORDER BY klienci.miasto;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "$row[imie], $row[cena]<br>";
    }
}
mysqli_close($conn);
?>
</body>
</html>
