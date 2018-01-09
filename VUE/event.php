<?php
if(isset($_SESSION['id']))
?>

<div class="row">
	<div class="col-7 offset-3" id="event">
           <?php listeEvent(); 

                 listeEventInscrit(7);
            
            ?>
	</div>
</div>