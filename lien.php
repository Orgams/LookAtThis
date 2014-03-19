<?php include("topPage.php"); ?>
<html>
  <?php include("head.php"); ?>
  <body>
    <?php 
      include("enTete.php");
    ?>
    <form method="post" name="formulaire" action="ajoutLien.php">
      <?php if(isSet($_GET['errUrlVide'])){ ?>
        <span class=erreur>L'URL du lien ne peut être vide</span>
      <?php } ?>
      <?php if(isSet($_GET['errSiteNull'])){ ?>
        <span class=erreur>L'URL doit correspondre à un site qui existe</span>
      <?php } ?>
      <br/>
      <label for="url">URL</label>
      <input type="text" name="url" id="url"/><br/>
      <?php
        $req = $bdd->prepare('SELECT nom, ID, typePersonne AS type, couleur
                              FROM utilisateur_groupe AS UG
                              INNER JOIN groupe ON UG.ID_groupe = groupe.ID
                              WHERE UG.ID_utilisateur = ?
                              AND groupe.typePersonne = ?');
                              
        $req->execute(array_merge(array($_SESSION['ID']) ,array(0)));
        echo "<div class=fondGris>";
        while($donnee = $req->fetch()){
          echo bloqueGroupeAjoutLien($donnee['couleur'], $donnee['type'], $donnee['nom'], $donnee['ID']);
        }
        echo "</div><div class=fondGris>";
        $req->execute(array_merge(array($_SESSION['ID']) ,array(1)));
        while($donnee = $req->fetch()){
          echo bloqueGroupeAjoutLien($donnee['couleur'], $donnee['type'], $donnee['nom'], $donnee['ID']);
        }
        echo "</div>";
        ?>
      </select>
      <br/>
      <a href="#" onClick=formulaire.submit()><span class="logo valider">W</span></a></td>
    </form>
    <?php include("footer.php"); ?>
  </body>
</html>