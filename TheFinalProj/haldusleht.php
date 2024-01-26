<?php
require('conf.php');

session_start();

function isAdmin(){
    return  isset($_SESSION['onAdmin']) && $_SESSION['onAdmin'];
}
?>
<!doctype html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kasutaja</title>
    <link rel="stylesheet" type="text/css" href="ZvezdiCss.css">
</head>
<body>
<h1>Arvutikomplektid</h1>

<nav>
    <ul>
        <li><a href='haldusleht.php'>Kasutaja</a></li>
        <?php if (isAdmin()) { //kui see on admin, siis on navigatsioonis alumine Admini leht?>
        <li><a href='AdminLeht.php'>Admin</a></li>
        <?php } ?>
        <li id='logout'><a href='logout.php'>Logi välja</a></li>
    </ul>
</nav>


<?php
//märkeruudu valimisel märgitakse 1 ja lisab selle väärtuse tabelisse kui märkeruut pole märgitud, on see 0
if (isset($_REQUEST["SalvestaTellimus"])) {
    global $yhendus;
    $choice1 = isset($_REQUEST['choice1']) ? 1 : 0;
    $choice2 = isset($_REQUEST['choice2']) ? 1 : 0;
    $kask = $yhendus->prepare("INSERT INTO arvutitellimused (kirjeldus, korpus, kuvar) VALUES (?, ?, ?)");
    $kask->bind_param("sii", $_REQUEST["kirjeldusKas"], $choice1, $choice2);
    $kask->execute();
}

?>

<h2>Kasutaja Leht</h2>

<div id='info'>Kirjutage, mida soovite saada ja me saadame selle teile.</div>

<table>
    <tr>
        <th>Kirjeldus</th>
        <th>Salvesta tegevus</th>
    </tr>
    <?php
    global $yhendus;
    //andmeväljund
    $kask=$yhendus->prepare("SELECT id, kirjeldus, korpus, kuvar FROM arvutitellimused");
    $kask->bind_result($idKas, $opisanieKas, $korpusKas, $monitorKas);
    $kask->execute();
    //Vorm kasutaja kirjelduse sisestamiseks
    ?>
    <form>
    <td><input type='text' name='kirjeldusKas' id="kirjeldusKas"></td>
    <td><input type='submit' name='SalvestaTellimus' value='Salvesta'></td>
    </tr>
    </form>
</table>
</body>
</html>