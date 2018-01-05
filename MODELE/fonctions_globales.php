<?php 

function bdd() {
    try
	{	$bdd = new PDO('mysql:host=localhost;dbname=whatthefoot;charset=utf8', 'root', '');
    	return $bdd;}
	catch(Exception $e)
	{   die('Erreur : '.$e->getMessage());}
}


function setIdSession($pseudo)
{
			//se connecte à la base de donnée
			$bdd = bdd();
			//On recherche l'id du client 
			$reponse = $bdd->query('SELECT idClient from Client where `Pseudo` = "'. $pseudo .  '" ');

		while ($donnees = $reponse->fetch())
			{
			// on met à la variable session l'id Du client
			$_SESSION['id'] = $donnees['idClient'];
			}
				$reponse->closeCursor();
}



function setPseudoSession($id)
{
			//se connecte à la base de donnée
			$bdd = bdd();
			//On recherche l'id du client 
			$reponse = $bdd->query('SELECT Pseudo from Client where `idClient` = "'. $id .  '" ');

		while ($donnees = $reponse->fetch())
			{
			// on met à la variable session l'id Du client
			$_SESSION['pseudo'] = $donnees['Pseudo'];
			}
				$reponse->closeCursor();

}

?>