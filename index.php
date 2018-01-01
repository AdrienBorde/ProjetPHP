<?php 

session_start();
session_unset();


include('connexionsql.php');

include('MODELE/modele.php');


include('CONTROLEUR/controleur_connexion.php');

if (isset($_POST['bouton'])) {
	require('vue/inscription.php');
}

if (!isset($_SESSION['pseudo'])) {
	require('vue/connexion.php');
}
else{echo "connecté avec le compte"; 
	 echo $_SESSION['pseudo'];}

require('VUE/header.php');
require('vue/sug_events.php');
require('vue/map.php');
require('vue/sug_amis.php');
require('vue/derniermatch.php');
require('vue/amis.php');
require('vue/footer.php');

include('CONTROLEUR/controleur_inscription.php');
include('CONTROLEUR/controleur_connexion.php');

 ?>

