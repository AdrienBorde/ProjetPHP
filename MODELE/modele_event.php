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

function supprimer_event($NomEvent,$DateEvent)
{
	$bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('DELETE FROM event WHERE NomEvent = $NomEvent AND DateEvent = $DateEvent');
    
    //éxécution de la requete
    $req->execute();
    $req->closeCursor();
}

function setNomEvent($idEvent,$NomEventChange)
{
	$bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('UPDATE event SET NomEvent = $NomEventChange WHERE idEvent = $idEvent');
    
    //éxécution de la requete
    $req->execute();
    $req->closeCursor();
}

function setDateEvent($idEvent,$DateEventChange)
{
	$bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('UPDATE event SET DateEvent = $DateEventChange WHERE idEvent = $idEvent');
    
    //éxécution de la requete
    $req->execute();
    $req->closeCursor();
}

function setStadeEvent($idEvent,$StadeEventChange)
{
	$bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('UPDATE event SET Stade = $StadeEventChange WHERE idEvent = $idEvent');
    
    //éxécution de la requete
    $req->execute();
    $req->closeCursor();
}

function setParticipantEvent($idEvent,$ParticipantEventChange)
{
	$bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('UPDATE event SET nbParticipant = $ParticipantEventChange WHERE idEvent = $idEvent');
    
    //éxécution de la requete
    $req->execute();
    $req->closeCursor();
}


function inscriptionEvent($idClient,$idEvent) {
	$bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('INSERT INTO participant(IdEvent, IdParticipant) VALUES(:IdEvent,:IdParticipant)');
    
    //éxécution de la requete
    $req->execute(array('IdEvent' => $idEvent,'IdParticipant' => $idClient));
    $req->closeCursor();
}

function listeEvent()
{
	$bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('SELECT idEvent, NomEvent, DateEvent, Stade, nbParticipant FROM event');
   $req->execute();
    ?>

    <table>
			<tr>
				<th>Nom de l'évenement</th>
				<th>Date évènement</th>
				<th>Stade</th>
				<th>Nombre de participants</th>
				<th>Inscription</th>
			</tr>
			
			<?php 

    //éxécution de la requete
    while ($donnees = $req->fetch())
	        	{       		
			
			echo "<tr>";
			echo "<td>" . $donnees['NomEvent'] . "</td>";
			echo "<td>" .$donnees['DateEvent'] . "</td>";
			echo "<td>" .$donnees['Stade'] . "</td>";
			echo "<td>" .$donnees['nbParticipant'] . "</td>";
			echo "<td> <form action='pageEvent.php' method='post' id='eventinscription'>
							<input type='hidden' name='idEvent' value='" .$donnees['idEvent'] . "' />
							<input type='submit' value='Inscription' name='eventinscription'/>
						</form> </td>" ;
			echo "</tr>";

			
				} ?>

	</table>
			<?php
					$req->closeCursor();
					
}

?>