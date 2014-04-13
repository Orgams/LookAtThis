<?php
  include("topPage.php");
  if(isSet($_GET["idLien"])){
    $idLien = $_GET["idLien"];
    $groupeSelectionee = $_SESSION['groupeSelectionne'];
    $groupeSelectionee = chercherSousGroupe($groupeSelectionee,$bdd);
    $place_holders = implode(',', array_fill(0, count($groupeSelectionee), '?'));
    $req = $bdd->prepare("UPDATE lien_groupe
                          SET vue = 1
                          WHERE ID_lien = ?
                          AND ID_groupe in ($place_holders)");
    $parametre = array_merge(array($idLien),$groupeSelectionee);
    $req->execute($parametre);
  }
  header("Location: index.php");
?>
