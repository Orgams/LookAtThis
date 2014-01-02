<?php
  include("topPage.php");
  if(isSet($_GET['action']) && isSet($_GET['id'])){
    modifGroupeSelect($_GET['action'], $_GET['id']);
    header("Location: ".$_SERVER["HTTP_REFERER"]);
  }
?>