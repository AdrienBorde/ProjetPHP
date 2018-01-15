<?php
if(isset($_SESSION['id']))
?>

<div class="row">
	
	<div class="col-1 offset-1 mx-auto" id="boutoncreationevent">
		<form action="pageEvent.php" method="post">
			<input type="submit" value="Créer un event" name="creationevent">
		</form>		
	</div>

	<div class="col-7 mx-auto" id="event">
           <?php 
           		 listeEvent(); 
                 listeEventInscrit($_SESSION['id']);

            ?>
	</div>
</div>