<?php include("topPage.php"); ?>
<html>
  <?php include("head.php"); ?>
  <body>
    <?php include("enTete.php");?>

    <form method="post" name="formulaire" action="lierGroupeFonction.php">
      <?php if(isSet($_GET['ok'])){ ?>
        <span class=success>Les groupes ont bien été lier au groupe <?php echo $_GET['ok']?></span>
      <?php } ?>
      <?php if(isSet($_GET['errPasFils'])){ ?>
        <span class=erreur>Il faut choisir au moins un enfant pour le groupe père</span>
      <?php } ?>
      <table class=form>
        <tr>
          <td><label for="pere">Nom du groupe parent</label></td>
          <td>
          <select name="pere">
            <?php
              $req = $bdd->prepare('SELECT nom, ID 
                      FROM utilisateur_groupe AS UG
                      INNER JOIN groupe ON UG.ID_groupe = groupe.ID
                      WHERE groupe.typePersonne =?');
              $req->execute(array(0));
              while($donnee = $req->fetch()){
                echo "<option value='".$donnee['ID']."'>".$donnee['nom']."</option>";
              }
            ?>
          </select>
          </td>

        </tr>
        <tr>
          <td>
                    
          <label for="enfants[]">Nom des groupes enfants</label></td>
          <td>
          <select name="enfants[]" multiple="multiple">
            <?php
              $req = $bdd->prepare('SELECT nom, ID 
                      FROM utilisateur_groupe AS UG
                      INNER JOIN groupe ON UG.ID_groupe = groupe.ID');
              $req->execute();
              while($donnee = $req->fetch()){
                echo "<option value='".$donnee['ID']."'>".$donnee['nom']."</option>";
              }
            ?>
          </select>
          </td>
        </tr>
      <table>
      <a href="#" onClick=formulaire.submit()><span class="logo valider">W</span></a></td>
    </form>
    <?php include("footer.php"); ?>
  </body>
</html>