<?php include("topPage.php"); ?>
<html>
  <?php include("head.php"); ?>
  <body>
    <?php 
      include("enTete.php");
    ?>
    <form method="post" name="formulaire" action="ajoutGroupe.php">
      <table class=form>
        <tr>
          <td><label for="nom">Nom du groupe</label></td>
          <td><input type="text" name="nom" id="nom"/></td>
          <?php if(isSet($_GET['errNomVide'])){ ?>
            <td class=erreur>Le nom du groupe ne peut être vide</td>
          <?php } ?>
        </tr>
        <tr>
          <td><label for="couleur">Couleur du groupe</label></td>
          <td><input type="color" name="couleur" id="couleur"/></td>
        </tr>
        <tr>
          <td><label for="type">Est une personne ?</label></td>
          <td><input type="checkbox" name="type" id="type" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><a href="#" onClick=formulaire.submit()><span class=logo>W</span></a></td>
         </tr>
      </table>
    </form>
    <?php include("footer.php"); ?>
  </body>
</html>