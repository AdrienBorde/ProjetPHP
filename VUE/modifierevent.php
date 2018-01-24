<!-- Ce formulaire permet de modifier un événement créer par l'utilisateur connecté, il comporte les mêmes paramètres que le formulaire de création d'événement -->
<div class="row">
	<form action="pageEvent.php" method="post" id="formmodifevent" class="col-6 mx-auto" >
		Nom de l'event :
		<input type="text" name="nommodifevent" id="nommodifevent"> </br>
		Date :
		<input type="datetime-local" name="datemodif" id="datemodif" min="2018-01-01T00:00" max="2025-12-31T00:00"> </br>
		Nombre de participant :
		<input type="number" name="nbparticipantmodif" id="nbparticipantmodif" min="1" max="22"> </br>

		<?php listeStade(); ?> </br>
		
		<input type="submit" value="Modifier" name="eventmodif" id="eventmodif">
	</form>
	
</div>