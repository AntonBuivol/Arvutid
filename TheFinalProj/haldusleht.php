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
        <?php if (isAdmin()) { ?>
        <li><a href='AdminLeht.php'>Admin</a></li>
        <?php } ?>
        <li id='logout'><a href='logout.php'>Logi välja</a></li>
    </ul>
</nav>


<?php
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
<table>
    <tr>
        <th>Kirjeldus</th>
        <th>Korpus</th>
        <th>Kuvar</th>
        <th>Salvesta tegevus</th>
    </tr>
    <?php
    global $yhendus;
    $kask=$yhendus->prepare("SELECT id, kirjeldus, korpus, kuvar FROM arvutitellimused");
    $kask->bind_result($idKas, $opisanieKas, $korpusKas, $monitorKas);
    $kask->execute();
    ?>
    <form>
    <td><input type='text' name='kirjeldusKas' id="kirjeldusKas"></td>
    <td><input type='checkbox' value='1' id='choice1' name="choice1"></td>
    <td><input type='checkbox' value='1' id='choice2' name="choice2"> </td>
    <td><input type='submit' name='SalvestaTellimus' value='Salvesta'></td>
    </tr>
    </form>
</table>
</body>
</html>