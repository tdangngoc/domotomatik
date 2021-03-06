<?php
include("dbh.php");
include("securite.php");

/*Déclaration des variables utiles aux requêtes*/
$idutilisateur=securite::sql($_SESSION['id_personne']);
$idmaison=securite::sql($_SESSION['id_maison_choisie']);

/*Requêtes*/
$req1 = $bdd->query("SELECT type FROM type_capteur");
$res1 = $req1->fetchAll();

$req2 = $bdd->query("SELECT * FROM maison WHERE id_utilisateur='$idutilisateur'");
$res2 = $req2->fetchAll();

$req3 = $bdd->query("SELECT nom_de_piece FROM piece WHERE id_maison='$idmaison'");
$res3 = $req3->fetchAll();

$tab_cap=[];
$tab_dom=[];
$tab_pce=[];

foreach ($res1 as $r1) {
    $tab_cap[]=$r1['type'];
}

foreach ($res2 as $r2) {
    $tab_temp=[];
    $tab_temp[]=$r2['numero'];
    $tab_temp[]=$r2['rue'];
    $tab_temp[]=$r2['complement'];
    $tab_temp[]=$r2['code_postal'];
    $tab_temp[]=$r2['ville'];
    $tab_temp[]=$r2['pays'];
    $tab_dom[]=$tab_temp;
}

foreach ($res3 as $r3) {
    $tab_pce[]=$r3['nom_de_piece'];
}

?>
