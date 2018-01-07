<?php

// Chargement des fichiers modèles fonctions enregistrement_membre($pseudo, $pass_hash, $email) et check_bdd($pseudo)
if(isset($_POST['Inscription']))
{
    // On rend inoffensif les données de l'utilisateur
    $_POST['pseudo'] = strtolower(htmlspecialchars($_POST['pseudo']));
    $_POST['email'] = htmlspecialchars($_POST['email']);
    $_POST['verif_email'] = htmlspecialchars($_POST['verif_email']);
    $_POST['mdp'] = htmlspecialchars($_POST['mdp']);
  
     
    $Test_pseudo = comparer_pseudo($_POST['pseudo']);
    $Test_mail = comparer_email($_POST['email']);
    
    // Verification de la validité de l'inscription
        // Verification du pseudo
        if($Test_pseudo)
        { 
           
          echo "pseudo déjà utilisé";
            
        }

        
        // Verification de l'email
        if($Test_mail)
        { 
           
         echo "email déjà utilisé";
            
        }
		
        // Verification de l'email correctement écrit la 2eme fois
        if($_POST['email'] != $_POST['verif_email'])
        {
            echo "Les 2 emails écrits ne correspondent pas";
        }
         
        // Si tout est ok on enregistre le membre
        else
        {  // Enregistrement du membre dans la bdd
            ajout_membre($_POST['pseudo'],$_POST['email'],$_POST['mdp']);             
        }      
}
