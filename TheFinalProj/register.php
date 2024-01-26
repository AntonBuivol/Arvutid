<?php
require_once("conf.php");
global $yhendus;
if (!empty($_POST['login']) && !empty($_POST['pass'])) {

    $login = htmlspecialchars(trim($_POST['login']));
    $pass = htmlspecialchars(trim($_POST['pass']));


    $cool = 'superpaev';
    $kryp = crypt($pass, $cool);


    $kask2 = $yhendus->prepare("INSERT INTO kasutaja (kasutaja, parool) VALUES (?, ?)");
    $kask2->bind_param("ss", $login, $kryp);
    $kask2->execute();
        
    echo '<script>alert("Registreerimine õnnestus!"); window.location.href = "login.php";</script>';

    $kask2->close();
    $yhendus->close();
    exit();

}
?>
<script>
    function back() {
        window.history.back();
    }
</script>
<h1>Registreerimine</h1>
<form action="" method="post">
    Kasutaja nimi: <input type="text" name="login"><br>
    Parool: <input type="password" name="pass" id="pass"><br>
    <input type="submit" value="Register" id="Tagasi">
    <input type="button" value="Tagasi" onclick="back()" id="Tagasi">
    <link rel="stylesheet" type="text/css" href="LogReg.css">

</form>