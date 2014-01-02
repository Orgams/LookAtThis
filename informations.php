<?php 
  if(count($_SESSION['groupe']) != 0){
    $place_holders = implode(',', array_fill(0, count($_SESSION['groupe']), '?'));
    $req = $bdd->prepare("SELECT couleur, typePersonne AS type, nom, ID
                          FROM groupe
                          WHERE ID IN ($place_holders)");

    $req->execute($_SESSION['groupe']); 
  }else{
    $req = $bdd->prepare("SELECT couleur, typePersonne AS type, nom, ID
                          FROM groupe
                          INNER JOIN utilisateur_groupe AS UG ON UG.ID_groupe = groupe.ID
                          WHERE ID_utilisateur = ?");
    $req->execute(array($_SESSION['ID']));
  }?>
<section class=informations>
  <?php
    while ($donnees = $req->fetch())
    {
      iconeGroupe($donnees['couleur'], $donnees['type'], $donnees['nom'], $donnees['ID']);
    }
    $req->closeCursor();
  ?>
</section>