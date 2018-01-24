<!-- Ce formulaire permet la création d'un événement, lors de l'appui du bouton, ce formulaire s'affiche avec les paramètres suivants : nom, date, stade, nombre de participants
	L'utilisateur peut alors créer son propre événement. -->
<div class="row">
	<form action="pageEvent.php" method="post" id="formevent" class="col-6 mx-auto" >
		Nom de l'event :
		<input type="text" name="nomevent" id="nomevent"> </br>
		Date :
		<input class="min-today" id="min" name="date" type="datetime-local" placeholder="YYYY-MM-DD" data-date-split-input="true" min="2018-01-01T00:00" max="2025-12-31T00:00" /> </br>
		Nombre de participant :
		<input type="number" name="nbparticipant" id="nbparticipant" min="1" max="22"> </br>

		<?php listeStade(); ?> </br>

		<input type="submit" value="Créer" name="eventcreer" id="eventcreer">
	</form>
</div>

