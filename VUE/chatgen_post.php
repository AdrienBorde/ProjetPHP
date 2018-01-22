<?php
// Connexion à la base de données
session_start();
include('../MODELE/fonctions_globales.php');
$bdd =bdd();

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO chatgen (Pseudo, message) VALUES(?, ?)');
echo $_SESSION['pseudo'];
$req->execute(array($_SESSION['pseudo'], $_POST['message']));

// Redirection du visiteur vers la page du minichat
header('Location: ../index.php');
?>