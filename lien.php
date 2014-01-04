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
        <span class=erreur>L'URL doit corespondre à un site qui existe</span>
      <?php } ?>
      <br/>
      <label for="url">URL</label>
      <input type="text" name="url" id="url"/><br/>
      <?php
        $req = $bdd->prepare('SELECT nom, ID 
                              FROM utilisateur_groupe AS UG
                              INNER JOIN groupe ON UG.ID_groupe = groupe.ID
                              WHERE groupe.typePersonne =?');
        $req->execute(array(1));
      ?>
      <select name="personne[]" multiple="multiple">
        <?php
          while($donnee = $req->fetch()){
            echo "<option value='".$donnee['ID']."'>".$donnee['nom']."</option>";
          }
        ?>
      </select>
      <?php
        $req->execute(array(0));
      ?>
      <select name="groupe[]" multiple="multiple">
        <?php
          while($donnee = $req->fetch()){
            echo "<option value='".$donnee['ID']."'>".$donnee['nom']."</option>";
          }
        ?>
      </select>
      <br/>
      <a href="#" onClick=formulaire.submit()><span class=logo>W</span></a></td>
    </form>
    <?php include("footer.php"); ?>
  </body>
</html>