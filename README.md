# Arvutid
## Registreerimine
Registreerimiseks kirjutasime PHP koodi, mis lisab kasutaja andmebaasi. Vaikimisi on kõigile kasutajatele määratud tavakasutaja roll.
```
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
```
## Login
Sisselogimiseks kirjutasime PHP koodi, mis kontrollib, kas sisselogimine ja parool on õigesti sisestatud ning kui tegu on adminiga, siis avaneb adminni leht.
```
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
```
