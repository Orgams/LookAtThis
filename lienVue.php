<?php
  include("topPage.php");
  if(isSet($_GET["idLien"])){
    $idLien = $_GET["idLien"];
    $place_holders = implode(',', array_fill(0, count($_SESSION['groupe']), '?'));
    $req = $bdd->prepare("UPDATE lien_groupe
                          SET vue = 1
                          WHERE ID_lien = ?
                          AND ID_groupe in ($place_holders)");
    $parametre = array_merge(array($idLien),$_SESSION['groupe']);
    $req->execute($parametre);
  }
  header("Location: liste.php");
?>
