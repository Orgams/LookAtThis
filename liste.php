<?php include("topPage.php"); ?>

<html>
  <?php include("head.php"); ?>
  <body>
    <?php 
      include("enTete.php");
      if(count($_SESSION['groupe']) != 0){
        $place_holders = implode(',', array_fill(0, count($_SESSION['groupe']), '?'));
        $req = $bdd->prepare("SELECT DISTINCT lien.ID, lien.url, lien.site, lien.titre 
                              FROM lien_groupe LG
                              INNER JOIN lien ON LG.ID_lien = lien.ID
                              WHERE LG.ID_groupe IN ($place_holders)");
        $req->execute($_SESSION['groupe']);
      }else{
        $req = $bdd->query("SELECT DISTINCT lien.ID, lien.url, lien.site, lien.titre 
                              FROM lien_groupe LG
                              INNER JOIN lien ON LG.ID_lien = lien.ID");
        $req->execute();
      }
      while ($donnees = $req->fetch())
      {
        $url =  htmlspecialchars($donnees['url']);
        $site =  htmlspecialchars($donnees['site']);
        $req2 = $bdd->prepare('SELECT groupe.couleur, groupe.typePersonne AS type, groupe.nom, groupe.ID
                               FROM lien_groupe LG
                               INNER JOIN groupe ON LG.ID_groupe = groupe.ID
                               WHERE ID_lien = ?');
        $req2->execute(array($donnees['ID']));

    ?>
        <section class=lien>
          <article>
            <a href= <?php echo $url ?> target="_blank"> <?php echo $url ?></a>
          </article>
          <aside>
            <a href= <?php echo $site ?> target="_blank"> <?php echo $site ?></a><?php
              while ($donnees2 = $req2->fetch())
              {
                $couleur = htmlspecialchars($donnees2['couleur']);
                $type = htmlspecialchars($donnees2['type']);
                $nom = $donnees2['nom'];
                iconeGroupe($donnees2['couleur'], $donnees2['type'], $donnees2['nom'], $donnees2['ID']);
              } 
            ?>
          </aside>
          <div class=action><span class=logo title='Marquer comme vue'>M</span></div>
        </section>
      
    <?php
      }
      $req->closeCursor();
      include("footer.php"); ?>
  </body>
</html>