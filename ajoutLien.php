<?php
  include("topPage.php");
  if(isSet($_POST["url"])){
    if($_POST["url"] == ""){
      header("Location: lien.php?errUrlVide=1");
    }
    if(!isSet($_POST["personne"])){
      $_POST["personne"] = array();
    }
    if(!isSet($_POST["groupe"])){
      $_POST["groupe"] = array();
    }
    $groupes = array_merge($_POST['personne'],$_POST['groupe']);
    
    $req = $bdd->prepare('SELECT ID FROM lien WHERE url=?');
    $req->execute(array($_POST["url"]));
    $donnee = $req->fetch();
    
    if($donnee==""){
      $url = $_POST["url"];
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_USERAGENT, 'LookAtThis');
      curl_setopt($ch, CURLOPT_COOKIESESSION, true); 
      $resultat = curl_exec($ch);
      curl_close($ch);

      $page = new DOMDocument();
      if($page->loadHTML($resultat)){
        $balise = $page->getElementsByTagName('title');
        $titre = $balise->item(0)->nodeValue;

        $url = urldecode($url);
        $url_decomposee = parse_url($url);
        $site = $url_decomposee['scheme']."://".$url_decomposee['host'];

        $req = $bdd->prepare('INSERT INTO lien (url, titre, site) VALUES (?, ?, ?)');
        $req->execute(array($url,$titre,$site));
        
        $req = $bdd->prepare('SELECT ID FROM lien WHERE url=?');
        $req->execute(array($_POST["url"]));
        $donnee = $req->fetch();
      }else{
        header("Location: lien.php?errSiteNull=1");;
      }
    }
    
    $idLien = $donnee['ID'];
    

    $req = $bdd->prepare('INSERT INTO utilisateur_lien (ID_utilisateur, ID_lien) VALUES (?, ?)');
    $req->execute(array($_SESSION['ID'], $idLien));
    
    $req = $bdd->prepare('INSERT INTO lien_groupe (ID_lien, ID_groupe) VALUES (?, ?)');
    
    foreach ($groupes as $groupe) {
      $req->execute(array($idLien, $groupe));
    }

  }
  //header("Location: lien.php");
?>