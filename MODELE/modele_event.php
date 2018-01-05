<?php

function getIdEvent($NomEvent,$DateEvent){
	$bdd = bdd();

	$reponse = $bdd->query('SELECT idEvent FROM event WHERE NomEvent = $NomEvent AND DateEvent = $DateEvent ');

	while ($donnees = $reponse->fetch())
	{
	   return $donnees['idEvent'];
	   }
	}

function getNomEvent($idevent) {
	$bdd = bdd();

	$reponse = $bdd->query('SELECT NomEvent FROM event WHERE idEvent = $idevent ');

	while ($donnees = $reponse->fetch())
	{
	   return $donnees['NomEvent'];
	   }
	}

function getStadeEvent($idevent) {
	$bdd = bdd();

	$reponse = $bdd->query('SELECT Stade FROM event WHERE idEvent = $idevent ');

	while ($donnees = $reponse->fetch())
	{
	   return $donnees['Stade'];
	   }
	}


function getDateEvent($idevent) {
	$bdd = bdd();

	$reponse = $bdd->query('SELECT DateEvent FROM event WHERE idEvent = $idevent ');

	while ($donnees = $reponse->fetch())
	{
	   return $donnees['DateEvent'];
	   }
	}

function getnbParticipantEvent($idevent) {
	$bdd = bdd();

	$reponse = $bdd->query('SELECT nbParticipant FROM event WHERE idEvent = $idevent ');

	while ($donnees = $reponse->fetch())
	{
	   return $donnees['nbParticipant'];
	   }
	}



function ajouter_event($Stade,$DateEvent,$NomEvent,$StadeCol,$nbParticipant)
{   //se connecter à la base de donnée
  
   $bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('INSERT INTO event(Stade,DateEvent,NomEvent,StadeCol,nbParticipant) VALUES(:Stade,:DateEvent,:NomEvent,:StadeCol,:nbParticipant)');
    
    //éxécution de la requete
    $req->execute(array('Stade' => $Stade,'DateEvent' => $DateEvent,'NomEvent' => $NomEvent ,'StadeCol' => $StadeCol ,'nbParticipant' => $nbParticipant));
    $req->closeCursor();
}

?>