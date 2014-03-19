<?php
  include("topPage.php");
  if(isSet($_GET['action']) && isSet($_GET['id'])){
    modifTableauSession($_GET['action'], $_GET['id'],'groupeSelectionne');
    header("Location: ".$_SERVER["HTTP_REFERER"]);
  }
?>