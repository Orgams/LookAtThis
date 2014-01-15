<?php
/*  include("topPage.php");
  echo "debut";
  if(isSet($_GET["idLien"])){
    $idLien = $_GET["idLien"];
    echo $idLien;
    $place_holders = implode(',', array_fill(0, count($_SESSION['groupe']), '?'));
    $req = $bdd->prepare("UPDATE lien_groupe
                          SET vue = 1
                          WHERE ID_lien = ?
                          AND ID_groupe in ($place_holders)");
    $parametre = array_merge(array($idLien),$_SESSION['groupe']);
    print_r($req);
    print_r($parametre);
    $req->execute($parametre);

    $req = $bdd->prepare('SELECT MAX(ID) AS ID FROM groupe WHERE nom = ? AND couleur = ? AND typePersonne = ?');
    $req->execute($param);
    $donnee = $req->fetch();
    $idGroupe = $donnee["ID"];
    
    $param = array($_SESSION["ID"], $idGroupe);
    $req = $bdd->prepare('INSERT INTO utilisateur_groupe VALUES (?, ?)');
    $req->execute($param);
  }
  header("Location: liste.php");*/
?>
