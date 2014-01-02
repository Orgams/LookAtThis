<?php
function modifGroupeSelect($action, $id){
  if($action == 'ajouter' && !in_array($id, $_SESSION['groupe']) ){
    array_push($_SESSION['groupe'],$id);
  }
  if($action == 'retirer' && in_array($id, $_SESSION['groupe']) ){
    $_SESSION['groupe'] = array_remove($_SESSION['groupe'],$id);
  }
}

function array_remove($array, $item){
  array_splice($array,array_search($item, $array),1);
  return $array;
}
function iconeGroupe($couleur, $type, $nom, $id) {
  if (in_array($id, $_SESSION['groupe'])){?>
    <a href='modifGroupeSelect.php?action=retirer&id=<?php echo $id ?>'>
  <?php
  }else{
  ?>
    <a href='modifGroupeSelect.php?action=ajouter&id=<?php echo $id ?>'>
    <?php
  }
  ?>
  <span class=logo style=color:<?php echo $couleur ?> title=<?php echo $nom ?> >
  <?php
  if ($type){
    echo "+";
  }else{
    echo ",";
  }
  ?>
    
  </span></a>
<?php
}
?>
<?php
function bloqueGroupe($couleur, $type, $nom, $idGroupe) {
?>
<section class=groupe>
  <article style=color:<?php echo $couleur ?>>
    <?php
      if (in_array($idGroupe, $_SESSION['groupe'])){
    ?>
    <a href='modifGroupeSelect.php?retour=selectionGroupe.php&action=retirer&id=<?php echo $idGroupe ?>'><span class=logo>\</span> 
    <?php
      }else{
    ?>
    <a href='modifGroupeSelect.php?retour=selectionGroupe.php&action=ajouter&id=<?php echo $idGroupe ?>'><span class=logo>]</span> 
    <?php
      }
    ?>
    </a>
    <?php echo $nom.' '.iconeGroupe($couleur, $type, $nom, $idGroupe)?>
  </article>
</section>
<?php
}
?>