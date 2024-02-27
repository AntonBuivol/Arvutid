# Arvutikomponentide tellimine

## Sisukord
1. [Projekti kohta](https://github.com/AntonBuivol/Arvutid?tab=readme-ov-file#projekti-kohta)
2. [Registreerimine](https://github.com/AntonBuivol/Arvutid/blob/main/README.md#registreerimine)
3. [Logi sisse](https://github.com/AntonBuivol/Arvutid/blob/main/README.md#logi-sisse)
4. [Lehed](https://github.com/AntonBuivol/Arvutid/blob/main/README.md#lehed)
   - [Kasutaja leht](https://github.com/AntonBuivol/Arvutid/blob/main/README.md#kasutaja-leht)
   - [Admini leht](https://github.com/AntonBuivol/Arvutid/blob/main/README.md#admini-leht)
5. [Link](https://github.com/AntonBuivol/Arvutid/blob/main/README.md#link)

## Projekti kohta
Sait on mõeldud arvutikomponentide tellimiseks.

![pilt](https://github.com/AntonBuivol/Arvutid/assets/120181261/cbe9cc8d-8548-4d56-a360-fe580a70d4f1)


## Registreerimine
Registreerimiseks kirjutasime PHP koodi, mis lisab kasutaja andmebaasi. Vaikimisi on kõigile kasutajatele määratud tavakasutaja roll.

![pilt](https://github.com/AntonBuivol/Arvutid/assets/120181261/3bd99571-87ee-4e2f-bb63-b8db4db46bdd)

<details><summary>Kood</summary>

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

</details>

## Logi sisse
Sisselogimiseks kirjutasime PHP koodi, mis kontrollib, kas sisselogimine ja parool on õigesti sisestatud ning kui tegu on adminiga, siis avaneb adminni leht.

![pilt](https://github.com/AntonBuivol/Arvutid/assets/120181261/21d1298b-18f4-4f55-b9ed-4c047de8140a)

<details><summary>Kood</summary>

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

</details>

## Lehed

### Kasutaja leht
Arvutikomponente saad tellida kasutajalehel. Kõigepealt tuleb kirjutada vajalike komponentide kirjeldused ja seejärel need salvestada. Pärast seda näeb administraator, mida soovite.

![pilt](https://github.com/AntonBuivol/Arvutid/assets/120181261/2b16fabd-d9d4-4482-9ab0-f1dab03f52c5)

### Admini leht

Oma lehel saab administraator:
* Vaata kõiki tellimusi
* Märkige vajalike komponentide olemasolu
* Pange tähele, et tellimus on pakitud

![pilt](https://github.com/AntonBuivol/Arvutid/assets/120181261/a48c635c-1096-4e02-ac00-b059dfab9486)

![pilt](https://github.com/AntonBuivol/Arvutid/assets/120181261/26ef81ae-cdb8-4b12-9179-76fff7613302)

## Link
[Veebileht](https://antonbuivol22.thkit.ee/phplehti/content/andmebaas/TheFinalProj/ControllPage.php)
