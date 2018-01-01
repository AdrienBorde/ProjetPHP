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
        $_SESSION['pseudo'] = $_POST['pseudo'];
        echo "Bienvenue sur le site  ";
        echo $_SESSION['pseudo'];
        }
        //si ils sont mauvais on active le message d'erreur sur la vue
        else ?>  <script> afficher("mauvais pseudo ou mauvais mot de passe"); </script>
         <?php
}
?>