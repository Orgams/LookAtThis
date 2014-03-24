<?php
  include("topPage.php");
  if(isset($_POST["pere"])){
    if(isSet($_POST["enfants"])){

      $pere = $_POST["pere"];

      //Preparer la requete pour lier les groupes
      $req = $bdd->prepare('REPLACE INTO groupe_groupe (
                                          groupePere, 
                                          groupeFils) 
                              VALUES (?, ?)');

      //Ajouter une ligne pour chaque enfants
      foreach ($_POST["enfants"] as $key => $value) {
        $req->execute(array($pere, $value));
      }
    
    header("Location: lierGroupe.php?ok=$pere");
    }
  header("Location: lierGroupe.php?errPasFils=1");
  }

  /*
  if(isSet($_POST["nom"]) && isSet($_POST["couleur"])){
    $nom = $_POST["nom"];
    if($nom == ""){
      header("Location: ajoutGroupe.php?errNomVide=1");
    }else{
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
        header("Location: ajoutGroupe.php?errNomExiste=1");
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
        header("Location: ajoutGroupe.php?ok=$nom");
      }
    }
  }*/
?>