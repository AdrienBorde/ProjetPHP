<?php 
include('connexionsql.php');

$_pseudo = $_GET["pseudo"];
if(isset($_pseudo))
{
	$reponse = $bdd-> query('SELECT * from client where pseudo="' .$_pseudo .'"');
	$donnees = $reponse->fetch();
}
?>
	<div class="col-7 mx-auto" id="map">
           <?php 
                if(isset($donnees['Pseudo']) )
                {
	       ?>
					<p> Profil de <?php echo $donnees['Pseudo']?> </p>
					<p> mail: <?php echo $donnees['mail']?> </p>
          <?php
                }
                else
                	// on affiche un message d'erreur nous expliquant que le profil n'existe pas 
                { ?>
                	<p> Ce profil n'existe pas </p>
           <?php
                }
           ?>
	</div>