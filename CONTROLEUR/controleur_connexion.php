    <?php 
    //on ajoute le modele pour utiliser les fonctions
    // si le formulaire de connexion est envoyé
    if(isset($_POST['connexion']))
        {
        $_POST['pseudo'] = strtolower(htmlspecialchars($_POST['pseudo']));
        $_POST['mdp'] = htmlspecialchars($_POST['mdp']);
        
        // valeur qui indique si la connexion est valide ou non
        $valid_connexion = connexion($_POST['pseudo'],$_POST['mdp']);
            // si les pseudos et mdp sont bon
            if ($valid_connexion){
            session_start();

            setIdSession($_POST['pseudo']);
            
            echo "Salut " . getPseudo($_SESSION['id']);
            }
            //si ils sont mauvais on active le message d'erreur sur la vue
            else   echo "mauvais pseudo ou mauvais mot de passe";
             
        }

    if(isset($_POST['deco']))
        {
           // Suppression des variables de session et de la session
           session_start();

           $_SESSION = array();

           session_destroy();      
           echo "session terminé";
        }
    
?>