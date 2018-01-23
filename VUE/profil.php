<?php 

// Nous allons lire les variable via l'url et si elle existe nous allons effectuer des actions qui leur sont associé 

//On vérifie qu'il y a bien une variable pseudo , puis on recupere les donnees dans la bdd de ce pseudo
if(isset($_GET["pseudo"]))
{	
  $_pseudo = $_GET["pseudo"];
  $bdd = bdd();

	$reponse = $bdd-> query('SELECT * from client where pseudo="' .$_pseudo .'"');
	$donnees = $reponse->fetch();

?>


	<div class="col-7 mx-auto" id="profil">
      
      <?php  
      // Nous vérifions que le pseudo rentré existe bien dans la bdd
      if(isset($donnees['Pseudo']))

      {
        if(isset($_GET["action"]))
        {


          $_action = $_GET["action"];

        switch($_action)
        { 
          //Selon l'action que l'on veut , nous allons soit modifier soit consulter le profil
          case "modifier":
          require('VUE/profil/profil_modifier.php');
          break;
          case "ajouter":
          require('VUE/profil/profil_ajouter.php');
          break;
          default :
          echo "cette opération n'existe pas";
          break;
         }
        
      }
      else
        // par défaut nous afficherons la page consulter si il n'y rien qui y est rentré

      {
         require('VUE/profil/profil_consulter.php');
      }
     }
        else {
          echo "ce pseudo n'existe pas ";
        }
        $reponse->closeCursor();
        }
       else 
        {
          echo "il manque des option dans l'URL" ;
        }


         ?>



	</div>