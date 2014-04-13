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
      $req = $bdd->prepare('SELECT nom
                            FROM groupe
                            WHERE ID = ?');
      $req->execute(array($pere));
      $nomPere = $req->fetch();

    header("Location: lierGroupe.php?ok=$nomPere");
    }else{
      header("Location: lierGroupe.php?errPasFils=1");
    }
  }else{
    header("Location: lierGroupe.php?errPasPere=1");
  }
?>