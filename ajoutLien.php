<?php
  include("topPage.php");
  if(isSet($_POST["url"])){
    $url = $_POST["url"];
    if($url == ""){
      header("Location: lien.php?errUrlVide=1");
    }
    if(!preg_match("#^http#", $url)){
      $url = "http://".$url;
    }
    echo $url;
    if(!isSet($_POST["personne"])){
      $_POST["personne"] = array();
    }
    if(!isSet($_POST["groupe"])){
      $_POST["groupe"] = array();
    }
    $groupes = array_merge($_POST['personne'],$_POST['groupe']);
    
    $req = $bdd->prepare('SELECT ID FROM lien WHERE url=?');
    $req->execute(array($url));
    $donnee = $req->fetch();
    
    if($donnee==""){
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_USERAGENT, 'LookAtThis');
      curl_setopt($ch, CURLOPT_COOKIESESSION, true); 
      $resultat = curl_exec($ch);
      curl_close($ch);

      $page = new DOMDocument('1.0', 'utf-8');
      $page->formatOutput = false;
      $page->preserveWhiteSpace = false;
      $page->strictErrorChecking = false; 
      if(@$page->loadHTML('<?xml encoding="UTF-8">' . $resultat)){
        $balise = $page->getElementsByTagName('title');
        $titre = $balise->item(0)->nodeValue;
        $titre = htmlentities($titre, ENT_QUOTES, mb_detect_encoding($titre)); 

        $url = urldecode($url);
        $url_decomposee = parse_url($url);
        $urlSite = $url_decomposee['scheme']."://".$url_decomposee['host'];
        $req = $bdd->prepare('SELECT ID FROM site WHERE url=?');
        $req->execute(array($urlSite));
        $donnee = $req->fetch();  
        
        if($donnee==""){
          $favicone = "http://www.google.com/s2/favicons?domain=".$urlSite;
          $couleurFav = convertColor(principal_color($favicone));
          
          $req = $bdd->prepare('INSERT INTO site (url, favicone, couleur) VALUES (?, ?, ?)');
          $req->execute(array($urlSite,$favicone,$couleurFav));
          
          $req = $bdd->prepare('SELECT ID FROM site WHERE url=?');
          $req->execute(array($urlSite));
          $donnee = $req->fetch();
        }
        $idSite = $donnee['ID'];
        
        $req = $bdd->prepare('INSERT INTO lien (url, titre, ID_site) VALUES (?, ?, ?)');
        $req->execute(array($url,$titre,$idSite));
        
        $req = $bdd->prepare('SELECT ID FROM lien WHERE url=?');
        $req->execute(array($url));
        $donnee = $req->fetch();
      }else{
        header("Location: lien.php?errSiteNull=1");;
      }
    }
    
    $idLien = $donnee['ID'];
    

    $req = $bdd->prepare('INSERT INTO utilisateur_lien (ID_utilisateur, ID_lien, dateCrea) VALUES (?, ?, NOW())');
    $req->execute(array($_SESSION['ID'], $idLien));
    
    $req = $bdd->prepare('INSERT INTO lien_groupe (ID_lien, ID_groupe) VALUES (?, ?)');
    
    foreach ($groupes as $groupe) {
      $req->execute(array($idLien, $groupe));
    }
  }
  header("Location: lien.php");
?>