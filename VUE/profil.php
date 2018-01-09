<?php 

$_pseudo = $_GET["pseudo"];
//On vérifie qu'il y a bien une variable pseudo , puis on recupere les donnees dans la bdd de ce pseudo
if(isset($_pseudo))
{	
  $bdd = bdd();

	$reponse = $bdd-> query('SELECT * from client where pseudo="' .$_pseudo .'"');
	$donnees = $reponse->fetch();
}
?>
	<div class="col-7 mx-auto" id="profil">
           <?php 
           		//Si le pseudo existe , on va afficher les informations du profil
                if(isset($donnees['Pseudo']) )
                {
	       ?>
					<p> Profil de <?php echo $donnees['Pseudo']?> </p>
					<p> mail: <?php echo $donnees['mail']?> </p>
          <?php
          		//Permet de voir si vous etes sur votre profil pour pouvoir le modifier aprés si besoin 
	          		if(strcmp($donnees['Pseudo'], $_SESSION['pseudo']) == 0)
	          		{
	          			echo "Vous etes sur votre session / ajouter modification";
	          		}
                }
                else
                	// on affiche un message d'erreur nous expliquant que le profil n'existe pas 
                { ?>
                	<p> Ce profil n'existe pas </p>
           <?php
                }
           ?>
	</div>