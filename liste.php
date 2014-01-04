<?php include("topPage.php"); ?>

<html>
  <?php include("head.php"); ?>
  <body>
    <?php 
      include("enTete.php");
      if(count($_SESSION['groupe']) != 0){
        $place_holders = implode(',', array_fill(0, count($_SESSION['groupe']), '?'));
        $req = $bdd->prepare("SELECT DISTINCT lien.ID, lien.url, site.url AS site, lien.titre, site.favicone, site.couleur
                              FROM lien_groupe LG
                              INNER JOIN lien ON LG.ID_lien = lien.ID
                              INNER JOIN site ON lien.ID_site = site.ID
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
        $url =  $donnees['url'];
        $site =  $donnees['site'];
        $favicone = $donnees['favicone'];
        $couleurFond = "rgba(".convertColor($donnees['couleur']).",0.3";
        $req2 = $bdd->prepare('SELECT groupe.couleur, groupe.typePersonne AS type, groupe.nom, groupe.ID
                               FROM lien_groupe LG
                               INNER JOIN groupe ON LG.ID_groupe = groupe.ID
                               WHERE ID_lien = ?');
        $req2->execute(array($donnees['ID']));
        $image = "http://www.google.com/s2/favicons?domain=$site";
    ?>
        <section class=lien style="background:<?php echo $couleurFond ?>">
          <article>
            <a href= <?php echo $url ?> target="_blank"> <img src="<?php echo $favicone ?>" /><?php echo $url ?></a>
          </article>
          <aside>
            <a href= <?php echo $site ?> target="_blank"> <?php echo $site; ?></a><?php
              while ($donnees2 = $req2->fetch())
              {
                $couleur = $donnees2['couleur'];
                $type = $donnees2['type'];
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