<?php include("topPage.php");?>

<html>
<?php include("head.php"); ?>
  <body>
<?php 
  include("enTete.php");
  $req = $bdd->prepare("SELECT DISTINCT nom, couleur, typePersonne AS type, ID
                        FROM utilisateur_groupe UG
                        INNER JOIN groupe ON UG.ID_groupe = groupe.ID
                        WHERE ID_utilisateur = ?");
  $req->execute(array($_SESSION['ID']));
  while($donnee = $req->fetch()){
    echo bloqueGroupeSelection($donnee['couleur'], $donnee['type'], $donnee['nom'], $donnee['ID']);
  }
  include("footer.php"); 
?>
  </body>
</html>