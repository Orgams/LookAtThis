<?php


function modifTableauSession($action, $valeur, $nomTableau){
  if($action == 'ajouter' && !in_array($valeur, $_SESSION[$nomTableau]) ){
    array_push($_SESSION[$nomTableau],$valeur);
  }
  if($action == 'retirer' && in_array($valeur, $_SESSION[$nomTableau]) ){
    $_SESSION[$nomTableau] = array_remove($_SESSION[$nomTableau],$valeur);
  }
}

function array_remove($array, $item){
  array_splice($array,array_search($item, $array),1);
  return $array;
}

function iconeGroupe($couleur, $type, $nom, $valeur) {
  if (in_array($valeur, $_SESSION['groupeSelectionne'])){?>
    <a href='modifTableauSession.php?action=retirer&id=<?php echo $valeur ?>'>
  <?php
  }else{
  ?>
    <a href='modifTableauSession.php?action=ajouter&id=<?php echo $valeur ?>'>
    <?php
  }
  if (!in_array($valeur, $_SESSION['groupeSelectionne'])){
    $couleur = "rgba(0,0,0,0.5)";
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

function bloqueGroupeSelection($couleur, $type, $nom, $idGroupe) {
  bloqueGroupe($couleur, $type, $nom, $idGroupe, 'modifTableauSession.php');
}
function bloqueGroupeAjoutLien($couleur, $type, $nom, $idGroupe) {
  bloqueGroupe($couleur, $type, $nom, $idGroupe, 'modifTableauSession.php');
}
?>
<?php
function bloqueGroupe($couleur, $type, $nom, $valeurGroupe) {
?>
<section class=groupe style="background:<?php echo ChangerTonCouleur($couleur,150); ?>">
  <article style=color:<?php echo $couleur ?>>
    <?php
      if (in_array($valeurGroupe, $_SESSION['groupeSelectionne'])){
    ?>
    <a href='modifTableauSession.php?action=retirer&id=<?php echo $valeurGroupe ?>'><span class=logo>\</span> 
    <?php
      }else{
    ?>
    <a href='modifTableauSession.php?action=ajouter&id=<?php echo $valeurGroupe ?>'><span class=logo>]</span> 
    <?php
      }
    ?>
    </a>
    <?php echo $nom.' '.iconeGroupe($couleur, $type, $nom, $valeurGroupe)?>
  </article>
</section>

<?php
}

//trouve la couleur "moyenne"
function principal_color($image) {
  $ImageChoisie = imagecreatefrompng($image);
  $TailleImageChoisie = getimagesize($image);
  
  $largeur=0;
  $hauteur=0;
  $rouge=0;
  $vert=0;
  $bleu=0;
  
  while($hauteur<$TailleImageChoisie[1]){
   
    while($largeur<$TailleImageChoisie[0]){
  
 
      $rgb=imagecolorat($ImageChoisie, $largeur, $hauteur);
      $r = ($rgb >> 16) & 0xFF; 
      $g = ($rgb >> 8) & 0xFF; 
      $b = $rgb & 0xFF;
      
      $rouge+=$r;
      $vert+=$g;
      $bleu+=$b;
      
      $largeur++;
 
  }
  $hauteur++;
  $largeur=0;
  }
   
  $total_pixel=$TailleImageChoisie[0]*$TailleImageChoisie[1];
  $rouge=round($rouge/$total_pixel);
  $bleu=round($bleu/$total_pixel);
  $vert=round($vert/$total_pixel);
  
  
  $couleur=$rouge.','.$vert.','.$bleu;
  return $couleur;
}

function ChangerTonCouleur($couleur,$changementTon){
  $couleur=substr($couleur,1,6);
  $cl=explode('x',wordwrap($couleur,2,'x',3));
  $couleur='';
  for($i=0;$i<=2;$i++){
    $cl[$i]=hexdec($cl[$i]);
    $cl[$i]=$cl[$i]+$changementTon;
    if($cl[$i]<0) $cl[$i]=0;
    if($cl[$i]>255) $cl[$i]=255;
    $couleur.=StrToUpper(substr('0'.dechex($cl[$i]),-2));
  }
  return '#'.$couleur; 
}

function convertColor($color){
  #convert hexadecimal to RGB
  if(!is_array($color) && preg_match("/^[#]([0-9a-fA-F]{6})$/",$color)){

    $hex_R = substr($color,1,2);
    $hex_G = substr($color,3,2);
    $hex_B = substr($color,5,2);
    $RGB = hexdec($hex_R).",".hexdec($hex_G).",".hexdec($hex_B);

  return $RGB;
  }

  #convert RGB to hexadecimal
  else{
  if(!is_array($color)){$color = explode(",",$color);}

  $hex_RGB="";
  foreach($color as $value){
  $hex_value = dechex($value); 
  if(strlen($hex_value)<2){$hex_value="0".$hex_value;}
    $hex_RGB.=$hex_value;
  }

  return "#".$hex_RGB;
  }

}

function afficherReq($requete, $parametre){
  print_r($requete);
  echo "<br/>";
  print_r($parametre);
  echo "<br/>";

}
?>