<?php


// La page event ne s'affiche que si l'utilisateur est connecté, on vérifie donc qu'il existe un $_SESSION['id']

if(isset($_SESSION['id']))
?>

<div class="row">
	
	<!-- On créer un bouton qui permettra à l'utilisateur de créer un événement -->
	<div class="col-1 offset-1 mx-auto" id="boutoncreationevent">
		<form action="pageEvent.php" method="post">
			<input class='btn btn-primary' type="submit" value="Créer un event" name="creationevent">
		</form>		
	</div>

	<!-- Cette colonne de largeur 7 affiche la liste des événements, la liste des événements où l'utilisateur est inscrit et la liste des événements que l'utilisateur à créer
		Chaque liste possède sa fonction respective, on y passe l'id de l'utilisateur connecté en paramètre pour les 2 dernières listes afin de personnaliser les listes -->
	<div class="col-7 mx-auto" id="event">
           <?php 
           		 listeEvent(); 
                 listeEventInscrit($_SESSION['id']);
                 listeEventCreer($_SESSION['id']);

            ?>
	</div>
</div>