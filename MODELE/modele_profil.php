<?php 

//Retourne la liste des amis de l'utilisateur connecté
function listeAmis()
{
			//se connecte à la base de donnée
			$bdd = bdd();
			//On recherche l'id du client dans la table ami
			$reponse = $bdd->query('SELECT idAmi1,idAmi2,Pseudo
									from amis
									join Client on idAmi2 = idClient
									where idAmi1 = "' .$_SESSION['id'].'"
									');
			  while ($donnees = $reponse->fetch())
	        	{
	        		//à chaque ligne de la table , nous allons lire le pseudo de idAmi2
			?>
			<li>  <a href="<?php echo "pageProfil.php?pseudo=".$donnees['Pseudo'] ?>"> <?php echo $donnees['Pseudo'] ?>   </a></li>
			
			<?php
				}
					$reponse->closeCursor();
}



?>