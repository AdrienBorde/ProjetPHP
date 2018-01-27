<?php 

// Nous allons lire les variable via l'url et si elle existe nous allons effectuer des actions qui leur sont associé 

//On vérifie qu'il y a bien une variable pseudo , puis on recupere les donnees dans la bdd de ce pseudo
if(isset($_GET["pseudo"]))
{	
  $_pseudo = $_GET["pseudo"];


?>


      <?php  
      // Nous vérifions que le pseudo rentré existe bien dans la bdd
      if(pseudoExist($_pseudo) == true )
      {
      	// Nous initialisons des variables qui seront réutilisé dans les pages
      	$idClient= getIdClient($_GET['pseudo']);
        $avatar=  getAvatar($idClient);
        $prenom=  getPrenom($idClient);
        $nom=  getNom($idClient);
        $ville=  getVille($idClient);
        $birth=  getBirth($idClient);
        $description=  getDescription($idClient);
        $poste= getPoste($idClient);
        $mail= getMail($idClient);

        //Si il y a un champs action, nous allons avoir accès à certaine partie de pages
        if(isset($_GET["action"]))
        {

          $_action = $_GET["action"];

        switch($_action)
        { 
          //Selon l'action que l'on veut , nous allons soit modifier soit consulter le profil
          case "modifier":
          $_modifier = "autorisé modification";
           
          // 
          break;
          case "ajouter":
         $_ajout = "autorisé ajout";
         // require('VUE/profil/profil_ajouter.php');
          break;
          default :
          echo "cette opération n'existe pas";
          break;
         }
        
      }
      else
        // par défaut nous afficherons la page consulter si il n'y rien qui y est rentré
      {
         $_consulter = "autorisé consultation";
      }
     }
        else {
         // Le pseudo n'est pas renseigné dans la bdd
          echo "ce pseudo n'existe pas ";
        }        }
       else 
        {
         // Il n'y a pas de pseudo renseingé 
          echo "il manque des option dans l'URL" ;
        }


         ?>



