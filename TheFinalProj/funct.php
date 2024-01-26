<?php
require ("conf.php");


//väljundfunktsioon
function autoKuvamine(){
    global $yhendus;
    $paring = $yhendus->prepare("SELECT id, kirjeldus, korpus, kuvar, pakitud  FROM arvutitellimused");
    $paring->bind_result($arvutiIdAd, $opisanieAd, $korpusAd, $monitorAd, $upakovkaAd);
    $paring->execute();
    $andmed = array();
    while($paring->fetch()) {
        $arvuti = new stdClass();
        $arvuti->id = $arvutiIdAd;
        $arvuti->kirjeldus = htmlspecialchars($opisanieAd);
        $arvuti->korpus = htmlspecialchars($korpusAd);
        $arvuti->kuvar = $monitorAd;
        $arvuti->pakitud = $upakovkaAd;
        array_push($andmed, $arvuti);
    }
    return $andmed;
}
//funktsiooni muutmine
function muuda($id, $korpus, $monitor, $pakitud){
    global $yhendus;
    $paring = $yhendus->prepare("UPDATE arvutitellimused SET 
                   korpus=?, kuvar=?, pakitud=?
                   WHERE id=?");
    $paring->bind_param("iiii", $korpus, $monitor, $pakitud, $id);
    $paring->execute();
}
?>