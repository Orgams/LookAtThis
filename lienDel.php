<?php
  include("topPage.php");
  
  //si il y a un lien a supprimer 
  if(isSet($_GET["idLien"])){
    $idLien = $_GET["idLien"];
    $id = $_SESSION["ID"];
    
    //recuperer tous les groupes appartenant à l'utilisateur
    $parametre = array($id);
    $req = $bdd->prepare("SELECT ID_groupe FROM utilisateur_groupe
                          WHERE ID_utilisateur = ?");
    $req->execute($parametre);
    $i=0;
    while ($donnees = $req->fetch()){
      $allUser[$i++] = $donnees["ID_groupe"];
    }
    
    //supprimer le lien pour tout les groupe de l'utilisateur
    $place_holders = implode(',', array_fill(0, count($allUser), '?'));
    $parametre = array_merge(array($idLien),$allUser);
    $req = $bdd->prepare("DELETE FROM lien_groupe
                          WHERE ID_lien = ?
                          AND ID_groupe IN ($place_holders)");
    print_r($req);
    echo "<br/>";
    print_r($parametre);
    echo "<br/>";
    $req->execute($parametre);

    //supprimer le lien pour l'utilisateur
    $parametre = array($idLien);
    $req = $bdd->prepare("DELETE FROM utilisateur_lien
                          WHERE ID_lien = ?");
    $req->execute($parametre);
    
    //compter le nombre d'utilisateur ayant encore ce lien
    $parametre = array($idLien);
    $req = $bdd->prepare("SELECT count(*) FROM `lien` WHERE `ID` = ?");
    $req->execute($parametre);
    $donnees = $req->fetch();
    if($donnees[0] != 0){
          $req = $bdd->prepare("DELETE FROM lien
                                WHERE ID = ?");
          print_r($req);
          echo "<br/>";
          print_r($parametre);
          echo "<br/>";
          $req->execute($parametre);
    }
  }
  //header("Location: liste.php");
?>
