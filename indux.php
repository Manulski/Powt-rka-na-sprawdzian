<?php 
$polaczenie = mysqli_connect("localhost","root","","biblioteka");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php

$noc = date("w");
if ($noc == 0) {
    $noc = 'niedziela';
} else if($noc == 1){
    $noc = 'poniedziałek';
} else if ($noc == 2){
    $noc = 'Ftorek';
}
echo "dzisiaj jest :$noc";
?>

<?php 
$dane = "jan kowalski";
$plik = fopen("wizyta.txt","w");
fwrite($plik,"Jan Kowalski");
fclose($plik);
?>
<br>
<?php
$tablica = [];
$losowa;

for ($i=0; $i < 101 ; $i++) { 
    $losowa = rand(1,100);
    $tablica[] = $losowa;
    }
    print_r($tablica);

?>
<br>

<?php
session_start();
if (isset($_SESSION)) {
    $_SESSION["licznik"] = 1;
    echo $_SESSION["licznik"];
} else{
    $_SESSION["licznik"]++;
    echo $_SESSION["licznik"];
}
?>


<?php 
if (isset($_COOKIE["regulamin"])) {
    setcookie("regulamin", 0 , time() + 60*60);
    echo "dziekuujemy za zaakceptowanie regulaminu";
} else{
    echo "zaakceptuj regulamin";
    setcookie("regulamin",1,time() + 60 * 60);
    time() + 60*60;
}


?>
<br>

<?php
echo "<table> <tr> <th>Tytuł</th> <th>Id autora</th> </tr> "; 
$zapytanie = "SELECT tytul,id_autor FROM ksiazki";
$wynik = mysqli_query($polaczenie,$zapytanie);
while ($wiersz = mysqli_fetch_array($wynik)) {
echo "<tr><td>$wiersz[0]</td> <td>$wiersz[1]</td></tr>";
}
echo "</table>";
?>


</body>
</html>

<?php ?>