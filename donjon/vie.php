<?php
if (isset($_GET['vie'])) // On a le slot et l'item'
{	$vie = $_GET['vie'];
	session_start();
   include("../include.php");
   $getid = intval(isset($_GET['id']));
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = '.$_SESSION['id'].'');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
	
   $nb_modifs = $bdd->exec('UPDATE membres SET vie = \' '.$vie.' \' WHERE id = '.$userinfo['id'] );
}
else // Il manque des param�tres, on avertit le visiteur
{
	echo 'Il faut renseigner un slot et un item !';
}
?>