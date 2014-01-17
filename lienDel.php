<?php
  include("topPage.php");
  if(isSet($_GET["idLien"])){
    $idLien = $_GET["idLien"];
    $id = $_SESSION["ID"];
    
    $parametre = array($id);
    $req = $bdd->prepare("SELECT ID_groupe FROM utilisateur_groupe
                          WHERE ID_utilisateur = ?");
    $req->execute($parametre);
    $i=0;
    while ($donnees = $req->fetch()){
      $allUser[$i++] = $donnees["ID_groupe"];
    }
    $place_holders = implode(',', array_fill(0, count($allUser), '?'));

    $parametre = array_merge(array($idLien),$allUser);
    $req = $bdd->prepare("DELETE FROM lien_groupe
                          WHERE ID_lien = ?
                          AND $place_holders IN ($place_holders)");
    $req->execute($parametre);

    $parametre = array($idLien);
    $req = $bdd->prepare("DELETE FROM utilisateur_lien
                          WHERE ID_lien = ?");
    $req->execute($parametre);
    
    $req = $bdd->prepare("DELETE FROM lien_groupe
                          WHERE ID_lien = ?");
    $req->execute($parametre);
    
    $delLien = false;
    if($donnees = $req->fetch()){
      $delLien = true;
    }
    if($delLien){
      
    }
    /*
    $req = $bdd->prepare('SELECT MAX(ID) AS ID FROM groupe WHERE nom = ? AND couleur = ? AND typePersonne = ?');
    $req->execute($param);
    $donnee = $req->fetch();
    $idGroupe = $donnee["ID"];
    
    $param = array($_SESSION["ID"], $idGroupe);
    $req = $bdd->prepare('INSERT INTO utilisateur_groupe VALUES (?, ?)');
    $req->execute($param);*/
  }
  //header("Location: liste.php");
?>
