<?php 

// Cette fonction retourne un tableau, ce tableau est composé de tous les événements existants dans la base de données, chaque information de l'événement est affiché (mis à part l'id). Une colonne permettant de s'inscrire à l'événement avec un bouton permet à l'utilisateur de s'inscrire à l'événement en question, si il n'est pas complet.
function listeEvent()
{

	$bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('SELECT idEvent, NomEvent, Date, Stade, nbParticipant FROM event');
   $req->execute();
    ?>
    <h4>Tous les évenements :</h4>
    <table>
			<tr>
				<th>Nom de l'évenement</th>
				<th>Date évènement</th>
				<th>Stade</th>
				<th>Nombre de participants</th>
				<th>Personnes inscrites</th>
				<th>Inscription</th>
			</tr>
			
			<?php 

    //éxécution de la requete
    while ($donnees = $req->fetch())
	        	{       		
			
			echo "<tr>";
			echo "<td>" . $donnees['NomEvent'] . "</td>";
			echo "<td>" .$donnees['Date'] . "</td>";
			echo "<td>" .getStadeNom($donnees['Stade']) . "</td>";
			
			echo "<td>" .nombreInscrits($donnees['idEvent']). "/"  .$donnees['nbParticipant'] . "</td>";
			
			echo "<td>" . listeParticipant($donnees['idEvent']). "</td>";

			echo "<td> <form action='pageEvent.php' method='post' id='eventinscription'>
							<input type='hidden' name='idEvent' value='" .$donnees['idEvent'] . "' />
							<input class='btn btn-primary' type='submit' value='Inscription' name='eventinscription'/>
						</form> </td>" ;
			echo "</tr>";

			
				} ?>

	</table>
			<?php
					$req->closeCursor();
					
	}

// Ce tableau est similaire à celui ci-dessus. Par contre il n'affiche que les événements où l'utilisateur est inscrit. Une colonne "Deconnexion" est présente pour permettre à l'utilisateur connecté de se désinscrire si il le souhaite
function listeEventInscrit($idClient)
{
	$bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('SELECT event.idEvent, NomEvent, Date, Stade, nbParticipant FROM event
   							INNER JOIN participant on event.idEvent = participant.IdEvent
   							WHERE IdParticipant = "'. $idClient . '" ');
   $req->execute();
    ?>

    <h4>Evènement où je suis inscrit :</h4>
    <table>
			<tr>
				<th>Nom de l'évenement</th>
				<th>Date évènement</th>
				<th>Stade</th>
				<th>Nombre de participants</th>
				<!-- <th>Personnes inscrites</th> -->
				<th>Désinscription</th>
			</tr>
			
			<?php 

    //éxécution de la requete
    while ($donnees = $req->fetch())
	        	{       		
			
			echo "<tr>";
			echo "<td>" . $donnees['NomEvent'] . "</td>";
			echo "<td>" .$donnees['Date'] . "</td>";
			echo "<td>" .getStadeNom($donnees['Stade']) . "</td>";

			echo "<td>" .nombreInscrits($donnees['idEvent']). "/" .$donnees['nbParticipant'] . "</td>";

			// echo "<td>" .listeParticipant($donnees['idEvent']). "</td>";

			echo "<td> <form action='pageEvent.php' method='post' id='desinscription'>
							<input type='hidden' name='idEventDes' value='" .$donnees['idEvent'] . "' />
							<input class='des btn btn-primary' type='submit' value='Desinscription' name='desinscription'/>
						</form> </td>" ;
			echo "</tr>";

			
				} ?>

	</table>
			<?php
					$req->closeCursor();
					
}

// Ce tableau est similaire à celui ci-dessus. Par contre il n'affiche que les événements que l'utilisateurà créer. 
// Une colonne "Modifier" est présente pour permettre à l'utilisateur connecté de modofier les informations de l'événement s'il le souhaite.
// Une colonne "Supprimer" est présente pour permettre à l'utilisateur connecté de supprimer l'événement qu'il a crée s'il le souhaite.
function listeEventCreer($idClient)
{
	$bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('SELECT idEvent, NomEvent, Date, Stade, nbParticipant FROM event
   							INNER JOIN client on idCreateur = idClient
   							WHERE client.idClient = "'. $idClient . '" ');
   $req->execute();
    ?>

    <h4>Evènement que j'ai créée :</h4>
    <table>
			<tr>
				<th>Nom de l'évenement</th>
				<th>Date évènement</th>
				<th>Stade</th>
				<th>Nombre de participants</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			
			<?php 

    //éxécution de la requete
    while ($donnees = $req->fetch())
	        	{       		
			
			echo "<tr>";
			echo "<td>" . $donnees['NomEvent'] . "</td>";
			echo "<td>" .$donnees['Date'] . "</td>";
			echo "<td>" . getStadeNom($donnees['Stade']) . "</td>";
			echo "<td>"  .nombreInscrits($donnees['idEvent']). "/"  .$donnees['nbParticipant'] . "</td>";
			echo "<td> <form action='pageEvent.php?idEventMod=" . $donnees['idEvent']. "' method='post' id='desinscription'>
							<input class='btn btn-primary' type='submit' value='Modifier' name='modifierevent'/>
						</form> </td>" ;
			echo "<td> <form action='pageEvent.php' method='post' id='supprimerevent' >
							<input type='hidden' name='idEvent' value='" .$donnees['idEvent'] . "' />
							<input class='btn btn-primary' type='submit' value='Supprimer' name='supprimerevent'/>
						</form> </td>" ;

			echo "</tr>";

			
				} ?>

	</table>
			<?php
					$req->closeCursor();
					
}

// Cette fonction retourne la liste des stades existants, elle est utiliser dans les formulaires modifierevent.php et creerevent.php pour permettre à l'utilisateur de choisir le stade ou il souhaite faire se dérouler son événement.
function listeStade() {
	$bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('SELECT nom FROM stade');
   $req->execute();
   ?>
   <select name="stade">

   	<?php
   while ($donnees = $req->fetch())
	        	{       
					echo "<option name=" .$donnees['nom']. ">" .$donnees['nom'].  "</option>";
	        	}
	        	?>
	</select> <?php

}

// Cette fonction retourne la liste des participants inscrit à l'événement dont l'id est passé en paramètre.
// On retour alors une liste de pseudo cliquable permettant de consulter le profil de chaque participant.
function listeParticipant($idevent) {
	$bdd = bdd();

	$reponse = $bdd->query('SELECT IdParticipant FROM participant WHERE idEvent = "' .$idevent. '" ');
	$reponse->execute();
	$array = array();
	$i = 0;


	while ($donnees = $reponse->fetch())
	        	{
	        		//à chaque ligne de la table , nous allons lire le pseudo de idAmi2
			
			$array[$i] =  '<li> <a href="pageProfil.php?pseudo=' .getPseudo($donnees['IdParticipant']). '">' .getPseudo($donnees['IdParticipant']). '</a> </li>' ;
			$i = $i +1;
				}

				return implode("", $array);
			
	}
	