# Arvutikomponentide tellimine

[Veebileht](https://antonbuivol22.thkit.ee/phplehti/content/andmebaas/TheFinalProj/ControllPage.php)

![pilt](https://github.com/AntonBuivol/Arvutid/assets/120181261/896ca8ed-ac3b-43b3-9e89-7618811da355)

## Sisukord

1. [Projekti kohta](https://github.com/AntonBuivol/Arvutid?tab=readme-ov-file#projekti-kohta)
2. [Registreerimine](https://github.com/AntonBuivol/Arvutid/blob/main/README.md#registreerimine)
3. [Logi sisse](https://github.com/AntonBuivol/Arvutid/blob/main/README.md#logi-sisse)
4. [Kasutaja leht](https://github.com/AntonBuivol/Arvutid/blob/main/README.md#kasutaja-leht)
5. [Admini leht](https://github.com/AntonBuivol/Arvutid/blob/main/README.md#admini-leht)

## Projekti kohta
Sait on mõeldud arvutikomponentide tellimiseks.
![pilt](https://github.com/AntonBuivol/Arvutid/assets/120181261/e88eca7c-da10-41d7-ad0f-f971e776931a)



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
## Logi sisse
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

## Kasutaja leht
Arvutikomponente saad tellida kasutajalehel. Kõigepealt tuleb kirjutada vajalike komponentide kirjeldused ja seejärel need salvestada. Pärast seda näeb administraator, mida soovite.

![pilt](https://github.com/AntonBuivol/Arvutid/assets/120181261/2b16fabd-d9d4-4482-9ab0-f1dab03f52c5)

## Admini leht

Oma lehel saab administraator:
* Vaata kõiki tellimusi
* Märkige vajalike komponentide olemasolu
* Pange tähele, et tellimus on pakitud

![pilt](https://github.com/AntonBuivol/Arvutid/assets/120181261/a48c635c-1096-4e02-ac00-b059dfab9486)

![pilt](https://github.com/AntonBuivol/Arvutid/assets/120181261/26ef81ae-cdb8-4b12-9179-76fff7613302)
