<?php 

//ajouter un membre à la base de donnée
function ajout_membre($pseudo,$email,$mdp)
{   //se connecter à la base de donnée
  
   $bdd = new PDO('mysql:host=localhost;dbname=whatthefoot;charset=utf8', 'root', '');
   //Préparation de la requete 
   $req = $bdd->prepare('INSERT INTO Client(Pseudo, mdp, mail) VALUES(:pseudo,:mdp,:email)');
    
    //éxécution de la requete
    $req->execute(array('pseudo' => $pseudo,'mdp' => $mdp,'email' => $email));
    $req->closeCursor();
}


//compare le pseudo en paramètre à ceux de la base de donnée renvoie true s'il y a déjà le pseudo
function comparer_pseudo($pseudo){
// se connecter à la base de donnée
	$bdd = new PDO('mysql:host=localhost;dbname=whatthefoot;charset=utf8', 'root', '');
	// Récupération de tous les pseudos
	$reponse = $bdd->query('SELECT Pseudo FROM Client ');
	//on compare tous les peudos avec le parametre $Identifiant
	while ($donnees = $reponse->fetch())
	{
	   if ($donnees['Pseudo'] == $pseudo)
	   {
	    //return true si l'identifiant est déjà utilisé
	    return true;  
	   }
	   
		    
	}
	return false;
	$reponse->closeCursor();
	}

/*//compare l'email en parametre avec les emails de la bdd, renvoie true si il y a déjà l'email
function comparer_email($email){
// se connecter à la base de donnée
	$bdd = new PDO('mysql:host=localhost;dbname=whatthefoot;charset=utf8', 'root', '');
	// Récupération de tous les pseudos
	$reponse = $bdd->query('SELECT email FROM Client ');
	//on compare tous les emails avec le parametre $email
	while ($donnees = $reponse->fetch())
	{
	   if ($donnees['email'] == $email)
	   {
	    //return true si l'email est déjà utilisé
	    return true;  
	   }	  
	    
	}
	return false;
	$reponse->closeCursor();
	}

*/

function connexion($pseudo,$mdp)
{
	//se connecte à la base de donnée
	$bdd = new PDO('mysql:host=localhost;dbname=whatthefoot;charset=utf8', 'root', '');
	//On parcourt tous les utilisateurs
	$reponse = $bdd->query('SELECT pseudo, mdp FROM Client');
	
	while ($donnees = $reponse->fetch())
	{
		//on regarde si nos identifiants sont dans la base de donnée
		if ($donnees['pseudo'] == $pseudo AND $donnees['mdp']==$mdp)
		{
			//si oui on renvoie vrai
		return true;
		}
		
	}
}


?>