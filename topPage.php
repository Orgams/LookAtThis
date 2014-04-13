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
//section de test
print_r($_SESSION);
echo "<br/>";
foreach ($_SESSION as $key => $value) {
	echo $key." = ";
	print_r($value);
	echo "<br/>";
}
echo "--------------------------------------<br/>";*/
?>
<!DOCTYPE html>