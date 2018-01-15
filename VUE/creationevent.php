<div class="row">
	<form action="pageEvent.php" method="post" id="formevent" class="col-6 mx-auto" >
		Nom de l'event :
		<input type="text" name="nomevent" id="nomevent"> </br>
		Date :
		<input type="datetime-local" name="date" id="date"> </br>
		Nombre de participant :
		<input type="number" name="nbparticipant" id="nbparticipant"> </br>

		<?php listeStade(); ?> </br>

		<input type="submit" value="Créer" name="eventcreer" id="eventcreer">
	</form>
</div>