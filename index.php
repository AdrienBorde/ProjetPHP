<?php 




include('connexionsql.php');

include('MODELE/modele.php');

include('CONTROLEUR/controleur_inscription.php');
include('CONTROLEUR/controleur_connexion.php');


require('VUE/header.php');

if (!isset($_SESSION['id'])) {
	require('vue/connexion.php');
}

if (isset($_POST['bouton'])) {
	require('vue/inscription.php');
}

if (isset($_SESSION['id'])) {
	require('vue/deconnexion.php');
}

require('vue/sug_events.php');
require('vue/map.php');
require('vue/sug_amis.php');
require('vue/derniermatch.php');
require('vue/amis.php');
require('vue/footer.php');

 ?>

