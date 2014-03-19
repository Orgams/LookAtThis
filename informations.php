<?php 
  $groupeExiste = count($_SESSION['groupeSelectionne']) != 0;
  
  $base = "SELECT couleur, typePersonne AS type, nom, ID
           FROM groupe ";
  if($groupeExiste){
    $place_holders = implode(',', array_fill(0, count($_SESSION['groupeSelectionne']), '?'));
    
    $sqlGroupe = $base."WHERE ID IN ($place_holders)";
    $reqGroupe = $bdd->prepare($sqlGroupe);
    $reqGroupe->execute($_SESSION['groupeSelectionne']);
    
    $sqlNotGroupe = $base."WHERE ID NOT IN ($place_holders)";
    $reqNotGroupe = $bdd->prepare($sqlNotGroupe);
    $reqNotGroupe->execute($_SESSION['groupeSelectionne']);
  }else{
    $reqNotGroupe = $bdd->prepare("SELECT couleur, typePersonne AS type, nom, ID
                          FROM groupe
                          INNER JOIN utilisateur_groupe AS UG ON UG.ID_groupe = groupe.ID
                          WHERE ID_utilisateur = ?");
    $reqNotGroupe->execute(array($_SESSION['ID']));

  }
?>
<section class=informations>
  <?php
    if($groupeExiste){
      while ($donnees = $reqGroupe->fetch())
      {
        iconeGroupe($donnees['couleur'], $donnees['type'], $donnees['nom'], $donnees['ID']);
      }
      $req->closeCursor();
    }
    while ($donnees = $reqNotGroupe->fetch())
    {
      iconeGroupe($donnees['couleur'], $donnees['type'], $donnees['nom'], $donnees['ID']);
    }
    $req->closeCursor();
  ?>
</section>