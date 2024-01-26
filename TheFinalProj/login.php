<?php

require_once("conf.php");

session_start();

global $yhendus;

if (!empty($_POST['login']) && !empty($_POST['pass'])) {

    $login = htmlspecialchars(trim($_POST['login']));
    $pass = htmlspecialchars(trim($_POST['pass']));

    $cool='superpaev';
    $kryp = crypt($pass, $cool);

    $kask=$yhendus-> prepare("SELECT kasutaja, onAdmin FROM kasutaja WHERE kasutaja=? AND parool=?");
    $kask->bind_param("ss", $login, $kryp);
    $kask->bind_result($kasutaja, $onAdmin);
    $kask->execute();

    if ($kask->fetch()) {
        $_SESSION['tuvastamine'] = 'misiganes';
        $_SESSION['kasutaja'] = $login;
        $_SESSION['onAdmin'] = $onAdmin;
        if($onAdmin == 1){
            echo '<script>window.location.href = "AdminLeht.php";</script>';
        }
        else {
            echo '<script>window.location.href = "haldusleht.php";</script>';
            exit();
        }

    }
    else {
        echo "kasutaja $login või parool $kryp on vale";
        $yhendus->close();
    }
}
?>
<script>
    function back() {
        window.history.back();
    }
</script>
<h1>Sissepääs</h1>
<link rel="stylesheet" type="text/css" href="LogReg.css">


<form action="" method="post">
    Kasutaja nimi: <input type="text" name="login"><br>
    Parool: <input type="password" name="pass" id="pass"><br>
    <input type="submit" value="Logi sisse" id="Tagasi">
    <input type="button" value="Tagasi" id="Tagasi" onclick="back()">
</form>
