<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Wynajmujemy samochody</title>
</head>
<body>
    <section class="baner">
        <h1>Wynajem Samochodów</h1>
    </section>
    <section class="panel-lewy">
        <h2>DZIŚ POLECAMY TOYOTĘ ROCZNIK 2014</h2>
        <?php skrypt1(); ?>
        <h2>WSZYSTKIE DOSTĘPNE SAMOCHODY</h2>
        <?php skrypt2(); ?>
    </section>
    <section class="panel-środkowy">
        <h2>ZAMÓWIONE AUTA Z NUMERAMI TELEFONÓW KLIENTÓW</h2>
        <?php skrypt3(); ?>
    </section>
    <section class="panel-prawy">
        <H2>NASZA OFERTA</H2>
        <ul>
            <li>Fiat</li>
            <li>Toyota</li>
            <li>Opel</li>
            <li>Mercedes</li>
        </ul>
        <p>Tu pobierzesz naszą <a href="./komis.sql">bazę danych</a></p>
        <p>autor strony: 0123456789</p>
    </section>
</body>
</html>
<?php
function skrypt1()
{
    $host = "localhost";
    $user = "root";
    $password = "";
    $baza = "wynajem";
    $db = mysqli_connect($host, $user, $password, $baza);
    $sql = 'SELECT `id`,`model`,`kolor` FROM `samochody` WHERE `marka`= "toyota" AND `rocznik`="2014"';
    $wynik = mysqli_query($db, $sql);

    while ($wiersz = mysqli_fetch_assoc($wynik)) {
        echo $wiersz['id'] . " Toyota " . $wiersz['model'] . ". Kolor: " . $wiersz['kolor'];
    }
    mysqli_close($db);
}

function skrypt2()
{
    $host = "localhost";
    $user = "root";
    $password = "";
    $baza = "wynajem";
    $db = mysqli_connect($host, $user, $password, $baza);
    $sql = 'SELECT `id`,`marka`,`model`,`rocznik` FROM `samochody`';
    $wynik = mysqli_query($db, $sql);

    while ($wiersz = mysqli_fetch_assoc($wynik)) {
        echo $wiersz['id'] . " " . $wiersz['marka'] . " " . $wiersz['model'] . " " . $wiersz['rocznik'] . "<br>";
    }
    mysqli_close($db);
}

function skrypt3()
{
    $host = "localhost";
    $user = "root";
    $password = "";
    $baza = "wynajem";
    $db = mysqli_connect($host, $user, $password, $baza);
    $sql = 'SELECT samochody.id, `model`, telefon FROM `samochody`, zamowienia WHERE samochody.id = zamowienia.id';
    $wynik = mysqli_query($db, $sql);

    while ($wiersz = mysqli_fetch_assoc($wynik)) {
        echo $wiersz['id'] . " " . $wiersz['model'] . " " . $wiersz['telefon'] . "<br>";
    }
    mysqli_close($db);
}
?>