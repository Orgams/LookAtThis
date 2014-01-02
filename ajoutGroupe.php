<?php
  include("topPage.php");
  if(isSet($_POST["nom"]) && isSet($_POST["couleur"])){
    if($_POST["nom"] == ""){
      header("Location: groupe.php?errNomVide=1");
    }
    if(isSet($_POST["type"])){
      $param = array($_POST["nom"],$_POST["couleur"],'1');
    }else{
      $param = array($_POST["nom"],$_POST["couleur"],'0');
    }
    $req = $bdd->prepare('INSERT INTO groupe (nom, couleur, typePersonne) VALUES (?, ?, ?)');
    $req->execute($param);

    $req = $bdd->prepare('SELECT MAX(ID) AS ID FROM groupe WHERE nom = ? AND couleur = ? AND typePersonne = ?');
    $req->execute($param);
    $donnee = $req->fetch();
    $idGroupe = $donnee["ID"];
    
    $param = array($_SESSION["ID"], $idGroupe);
    $req = $bdd->prepare('INSERT INTO utilisateur_groupe VALUES (?, ?)');
    $req->execute($param);
  }
  header("Location: groupe.php");
?>