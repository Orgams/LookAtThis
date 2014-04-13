<?php 
session_start();
include('fonction.php');
$_SESSION['mail'] = 'orgams.7@gmail.com';
$_SESSION['ID'] = '1';
if(!isSet($_SESSION['groupeSelectionne'])){
  $_SESSION['groupeSelectionne'] = array();
}
//$_SESSION['groupeSelectionne'] = array();
try{
	$bdd = new PDO('mysql:host=localhost;dbname=lookatthis', 'root', '');
}catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$req = $bdd->prepare('SELECT pseudonyme FROM Utilisateur WHERE ID = ?');
$req->execute(array($_SESSION['ID']));
$donnees = $req->fetch();
$pseudonyme = $donnees['pseudonyme'];
$req->closeCursor();


/*echo "--------------------------------------<br/>";
//section de visualisation
print_r($_SESSION);
echo "<br/>";
foreach ($_SESSION as $key => $value) {
	echo $key." = ";
	print_r($value);
	echo "<br/>";
}
echo "--------------------------------------<br/>";*/
echo "--------------------------------------<br/>";
//section de test
	$url = "http://www.w3sh.com/2014/01/21/un-bar-alien-va-ouvrir-aux-usa/";
	print_r($url);
	echo "<br/>";
	$url = urldecode($url);
	print_r($url);
	echo "<br/>";
	$url = parse_url($url);
	print_r($url);
	echo "<br/>";
	$url = $url['scheme']."://".$url['host'];
	print_r($url);
	echo "<br/>";
echo "--------------------------------------<br/>";
?>
<!DOCTYPE html>