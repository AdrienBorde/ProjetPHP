<?php 

$_pseudo = $_GET["pseudo"];
$_action = $_GET["action"];
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
      if(isset($donnees['Pseudo']))

      {


        switch($_action)
        { 
          //Selon l'action que l'on veut , nous allons soit modifier soit consulter le profil
          case "consulter":
          require('VUE/profil/profil_consulter.php');
          break;
          case "modifier":
          require('VUE/profil/profil_modifier.php');
          break;
          case "ajouter":
          require('VUE/profil/profil_ajouter.php');
          break;

          
         }




        
      }
        else {
          echo "ce pseudo n'existe pas ";
        }
$reponse->closeCursor();



         ?>



	</div>