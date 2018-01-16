<div class="row">
	<form action="pageEvent.php" method="post" id="formmodifevent" class="col-6 mx-auto" >
		Nom de l'event :
		<input type="text" name="nommodifevent" id="nommodifevent"> </br>
		Date :
		<input type="datetime-local" name="datemodif" id="datemodif"> </br>
		Nombre de participant :
		<input type="number" name="nbparticipantmodif" id="nbparticipantmodif"> </br>

		<?php listeStade(); ?> </br>
		
		<input type="submit" value="Modifier" name="eventmodif" id="eventmodif">
	</form>
	
</div>