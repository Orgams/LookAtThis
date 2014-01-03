<?php
  include("topPage.php");
  if(isSet($_POST["url"])){
    if($_POST["url"] == ""){
      header("Location: lien.php?errUrlVide=1");
    }
    $groupes = array_merge($_POST['personne'],$_POST['groupe']);
    
    $req = $bdd->prepare('SELECT ID FROM lien WHERE url=?');
    $req->execute(array($_POST["url"]));
    $donnee = $req->fetch();
    
    if($donnee==""){

      $req = $bdd->prepare('INSERT INTO lien (url, titre, site) VALUES (?, "VIDE", "VIDE")');
      $req->execute(array($_POST["url"]));
      
      $req = $bdd->prepare('SELECT ID FROM lien WHERE url=?');
      $req->execute(array($_POST["url"]));
      $donnee = $req->fetch();
    }
    print_r($donnee);
    print_r($_SESSION['ID']);
    
    $idLien = $donnee['ID'];
    
    $req = $bdd->prepare('INSERT INTO utilisateur_lien (ID_utilisateur, ID_lien) VALUES (?, ?)');
    $req->execute(array($_SESSION['ID'], $idLien));
    
    $req = $bdd->prepare('INSERT INTO lien_groupe (ID_lien, ID_groupe) VALUES (?, ?)');
    
    foreach ($groupes as $groupe) {
      $req->execute(array($idLien, $groupe));
    }
    
  }
  header("Location: lien.php");
?>