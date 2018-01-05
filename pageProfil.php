<?php 

session_start();
include('MODELE/fonctions_globales.php');

include('MODELE/modele_profil.php');
include('MODELE/modele_connexion_inscription.php');

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
	require('vue/profil.php');
}

require('vue/footer.php');

?>