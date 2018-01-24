<?php

// Les fonctions "get....." suivantes permettent de récupérer les différentes données concernant un événement, un stade ou un client 



function getIdEvent($NomEvent,$DateEvent){
	$bdd = bdd();

	$reponse = $bdd->query('SELECT idEvent FROM event WHERE NomEvent = "' .$NomEvent. '" AND Date = "'.$DateEvent. '" ');
	$reponse->execute();

	while ($donnees = $reponse->fetch())
	{
	   return $donnees['idEvent'];
	   }
	}

function getNomEvent($idevent) {
	$bdd = bdd();

	$reponse = $bdd->query('SELECT NomEvent FROM event WHERE idEvent = "' .$idevent. '" ');
	$reponse->execute();

	while ($donnees = $reponse->fetch())
	{
	   return $donnees['NomEvent'];
	   }
	}

function getStadeEvent($idevent) {
	$bdd = bdd();

	$reponse = $bdd->query('SELECT Stade FROM event WHERE idEvent = "' .$idevent. '" ');
	$reponse->execute();

	while ($donnees = $reponse->fetch())
	{
	   return $donnees['Stade'];
	   }
	}


function getDateEvent($idevent) {
	$bdd = bdd();

	$reponse = $bdd->query('SELECT DateEvent FROM event WHERE idEvent = "' .$idevent. '" ');
	$reponse->execute();

	while ($donnees = $reponse->fetch())
	{
	   return $donnees['DateEvent'];
	   }
	}

function getnbParticipantEvent($idevent) {
	$bdd = bdd();

	$reponse = $bdd->query('SELECT nbParticipant FROM event WHERE idEvent = "' .$idevent. '" ');
	$reponse->execute();

	while ($donnees = $reponse->fetch())
	{
	   return $donnees['nbParticipant'];
	   }
	}

function getStadeid($nomstade) {
	$bdd = bdd();

	$reponse = $bdd->query('SELECT `idStade` FROM `stade` WHERE `nom` = "'.$nomstade.'" ');
	$reponse->execute();
	while ($donnees = $reponse->fetch())
	{
	   return $donnees['idStade'];
	   }
	}

function getStadeNom($idstade) {
	$bdd = bdd();

	$reponse = $bdd->query('SELECT `nom` FROM `stade` WHERE `idStade` = "'.$idstade.'" ');
$reponse->execute();
	while ($donnees = $reponse->fetch())
	{
	   return $donnees['nom'];
	   }
	}


function getPseudo($idClient) {
	$bdd = bdd();

	$reponse = $bdd->query('SELECT Pseudo FROM client WHERE idClient = "' .$idClient. '" ');

	while ($donnees = $reponse->fetch())
	{
	   return $donnees['Pseudo'];
	   }
	}


// Les fonctions "set....." suivantes permettent de mettre à jour les différentes données concernant un événement

function setNomEvent($idEvent,$NomEventChange)
{
	$bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('UPDATE event SET NomEvent = "' .$NomEventChange. '" WHERE idEvent = "' .$idEvent. '" ');
    
    //éxécution de la requete
    $req->execute();
    $req->closeCursor();
}

function setDateEvent($idEvent,$DateEventChange)
{
	$bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('UPDATE event SET DateEvent = "' .$DateEventChange. '" WHERE idEvent = "' .$idEvent. '" ');
    
    //éxécution de la requete
    $req->execute();
    $req->closeCursor();
}

function setStadeEvent($idEvent,$StadeEventChange)
{
	$bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('UPDATE event SET Stade = "' .$StadeEventChange. '" WHERE idEvent = "' .$idEvent. '" ');
    
    //éxécution de la requete
    $req->execute();
    $req->closeCursor();
}

function setParticipantEvent($idEvent,$ParticipantEventChange)
{
	$bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('UPDATE event SET nbParticipant = "' .$ParticipantEventChange. '" WHERE idEvent = "' .$idEvent. '" ');
    
    //éxécution de la requete
    $req->execute();
    $req->closeCursor();
}



