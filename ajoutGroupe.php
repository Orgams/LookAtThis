<?php
  include("topPage.php");
  if(isSet($_POST["nom"]) && isSet($_POST["couleur"])){
    $nom = $_POST["nom"];

    if($nom == ""){
      header("Location: groupe.php?errNomVide=1");
    }
    
    $nom = htmlentities($nom, ENT_QUOTES, mb_detect_encoding($nom));
    if(isSet($_POST["type"])){
      $param = array($nom,$_POST["couleur"],'1');
    }else{
      $param = array($nom,$_POST["couleur"],'0');
    }

    $req = $bdd->prepare('SELECT COUNT( * ) AS nbRes
                          FROM groupe
                          WHERE nom = ?
                          AND couleur = ?
                          AND typePersonne = ?');
    $req->execute($param);
    $donnee = $req->fetch();
    if($donnee["nbRes"]>0){
      header("Location: groupe.php?errNomExiste=1");
    }else{
      
      $req = $bdd->prepare('INSERT INTO groupe (nom, couleur, typePersonne) 
                            VALUES (?, ?, ?)');
      $req->execute($param);    
      
      $req = $bdd->prepare('SELECT MAX(ID) AS ID 
                            FROM groupe 
                            WHERE nom = ? 
                            AND couleur = ? 
                            AND typePersonne = ?');
      $req->execute($param);
      $donnee = $req->fetch();
      $idGroupe = $donnee["ID"];

      
      $param = array($_SESSION["ID"], $idGroupe);
      $req = $bdd->prepare('INSERT INTO utilisateur_groupe VALUES (?, ?)');
      $req->execute($param);
    }
  }
  header("Location: groupe.php");
?>