<?php 

session_start();
include('MODELE/fonctions_globales.php');

include('MODELE/modele_event.php');
include('MODELE/modele_profil.php');
include('MODELE/modele_connexion_inscription.php');

include('CONTROLEUR/controleur_inscription.php');
include('CONTROLEUR/controleur_connexion.php');
include('CONTROLEUR/controleur_event.php');

require('VUE/header.php');

if (!isset($_SESSION['id'])) {
	require('vue/connexion.php');
}

if (isset($_POST['bouton'])) {
	require('vue/inscription.php');
}

if (isset($_SESSION['id'])) {
	require('vue/deconnexion.php');
	require('vue/event.php');
}

if(isset($_POST['creationevent'])) 
{
	require('vue/creationevent.php');
}

if(isset($_POST['modifierevent'])) 
{
	$_SESSION['ideventmodif'] = $_GET['idEventMod'];
	require('vue/modifierevent.php');
}

require('vue/footer.php');



?>