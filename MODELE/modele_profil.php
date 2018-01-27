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
			<li>  <a href="<?php echo "pageProfil.php?pseudo=".$donnees['Pseudo']."&action=consulter" ?>"> <?php echo $donnees['Pseudo'] ?>   </a></li>
			
			<?php
				}
					$reponse->closeCursor();
}


//Fonction qui nous permets de modifier la table Client avec les données renntré en paramettre
function modifierClient($description,$Nom,$prenom,$ville,$birth,$poste,$id,$pseudo)
{
	$bdd = bdd();
	//partie traitement des modification
            //Déclaration des variable, que nous utiliserons pour modifier notre profil
            $i = 0;

            //extensions valide pour l'avatar
            $extensions_valides = array( 'jpg' , 'jpeg'  );
            //Poid de l'image max
            $maxsize = 2097152; 
            

            //nous vérifions qu'il y a bien un fichier qui a été envoyé comme avatar
             if(!(empty($_FILES['avatar']['tmp_name'])))
             {
                     $extension_upload = strtolower(substr(  strrchr($_FILES['avatar']['name'], '.')  ,1));  
                     $nomavatar = $id.'.'.$extension_upload; 
                    
                    //si l'extension n'est pas valide renvoie un message d'erreur
                     if (!in_array($extension_upload,$extensions_valides) )
                    {
                       $i++;
                       echo "Extension de l'avatar incorrecte";
                    }
                    //Si le fichier envoyé est trop gros , renvoie un message d'erreur
                     if ($_FILES['avatar']['size'] > $maxsize)
                    {
                      $i++;
                      echo   "Le fichier est trop gros ";
                    }

             }

             // on vérifie que la description est de bonne taille
            if (strlen($description) > 200)
          {
            echo "Votre nouvelle signature est trop longue";
            $i++;
          }

           

    if ($i == 0) // Si $i est vide, il n'y a pas d'erreur
    {

          // on vérifie que le fichier a été bien upload , puis nous le mettons dans le dossier issus à cet effet et nous changeons le nom du fichier
            if(!(empty($_FILES['avatar']['tmp_name'])))
            {
            $uploaddir = 'css/img/avatar/';
            $uploadfile = $uploaddir . basename($nomavatar);
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile)) {
                echo "Le fichier est valide, et a été téléchargé
                       avec succès.\n";
            } else {
                echo "Attaque potentielle par téléchargement de fichiers.
                      \n";
            }
            // on change la bdd par le nouveau nom du fichier si besoin
            $query=$bdd->prepare('UPDATE Client
                SET Avatar = :avatar 
                WHERE pseudo="' .$pseudo.'"');
                $query->bindValue(':avatar',$nomavatar,PDO::PARAM_STR);
                $query->execute();
                $query->CloseCursor();

            }

        //Si l'utilisateur veut supprimer son avatar
        if (isset($_POST['delete']))
        {
                  $query=$bdd->prepare('UPDATE Client
      SET Avatar=0 WHERE pseudo="' .$pseudo.'"');
                  $query->execute();
                  $query->CloseCursor();
        }
 

 
        //On modifie la table Client avec les valeurs rentré par l'utilisateur 
 
        $query=$bdd->prepare('UPDATE Client
        SET  Nom = :nom, Prenom =:prenom,Birth= :birth, Ville= :ville, Poste= :poste, Description=:description
        WHERE pseudo="' .$pseudo.'"');
        $query->bindValue(':nom',$Nom,PDO::PARAM_STR);
        $query->bindValue(':prenom',$prenom,PDO::PARAM_STR);
        $query->bindValue(':birth',$birth,PDO::PARAM_STR);
        $query->bindValue(':ville',$ville,PDO::PARAM_STR);
        $query->bindValue(':poste',$poste,PDO::PARAM_STR);
        $query->bindValue(':description',$description,PDO::PARAM_STR);
        $query->execute();
        $query->CloseCursor();

        echo'<h2>Modification terminée</h2>';
        echo'<p>Votre profil a été modifié avec succès !</p>';
        echo'<p>Cliquez <a href="index.php">ici</a> 
        pour revenir à la page d accueil</p>';
    }
    else
    {
        echo'<h1>Modification interrompue</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites pendant la modification du profil</p>';
        echo'<p>'.$i.' erreur(s)</p>';
        echo'<p>veuillez recommencer</p>';
    }


}


// Nous affiche la données contenu dans la table Client colonne Description
function getDescription($idClient) {
	$bdd = bdd();

	$reponse = $bdd->query('SELECT Description FROM client WHERE idClient = "' .$idClient. '" ');

	while ($donnees = $reponse->fetch())
	{
    
    return  $donnees['Description'];
	   
	   }
	}

// Nous affiche la données contenu dans la table Client colonne Avatar
function getAvatar($idClient)
{
    $bdd = bdd();

  $reponse = $bdd->query('SELECT Avatar FROM client WHERE idClient = "' .$idClient. '" ');

  while ($donnees = $reponse->fetch())
  {
    
    return $donnees['Avatar'];
     
     }
  }

// Nous affiche la données contenu dans la table Client colonne Poste
function getPoste($idClient)
{
    $bdd = bdd();

  $reponse = $bdd->query('SELECT Poste FROM client WHERE idClient = "' .$idClient. '" ');

  while ($donnees = $reponse->fetch())
  {
    
    return $donnees['Poste'];
     }
  }
// Nous affiche la données contenu dans la table Client colonne Poste
function getMail($idClient)
{
    $bdd = bdd();

  $reponse = $bdd->query('SELECT mail FROM client WHERE idClient = "' .$idClient. '" ');

  while ($donnees = $reponse->fetch())
  {
    
    return $donnees['mail'];
     }
  }

// Nous affiche la données contenu dans la table Client colonne Birth
function getBirth($idClient)
{
    $bdd = bdd();

  $reponse = $bdd->query('SELECT Birth FROM client WHERE idClient = "' .$idClient. '" ');

  while ($donnees = $reponse->fetch())
  {
    
    return $donnees['Birth'];
    
     }
  }


  // Nous affiche la données contenu dans la table Client colonne Ville
function getVille($idClient)
{
    $bdd = bdd();

  $reponse = $bdd->query('SELECT Ville FROM client WHERE idClient = "' .$idClient. '" ');

  while ($donnees = $reponse->fetch())
  {
    
    return $donnees['Ville'];
     
     }
  }

  // Nous affiche la données contenu dans la table Client colonne Nom
function getNom($idClient)
{
    $bdd = bdd();

  $reponse = $bdd->query('SELECT Nom FROM client WHERE idClient = "' .$idClient. '" ');

  while ($donnees = $reponse->fetch())
  {
    
    return $donnees['Nom'];
    
     }
  }

  // Nous affiche la données contenu dans la table Client colonne prenom
function getPrenom($idClient)
{
    $bdd = bdd();

  $reponse = $bdd->query('SELECT Prenom FROM client WHERE idClient = "' .$idClient. '" ');

  while ($donnees = $reponse->fetch())
  {
    
    return $donnees['Prenom'];
     
     }
  }

  // Va récuperer l'id Client par rapport à son nom
function getIdClient($idClient)
{
    $bdd = bdd();

  $reponse = $bdd->query('SELECT idClient FROM client WHERE pseudo = "' .$idClient. '" ');

  while ($donnees = $reponse->fetch())
  {
    
    return $donnees['idClient'];
   
     }
  }

  //La fonction nous permettra d'ajouter la personnes en ami si elle vérifie les conditions recquis
  function ajoutAmi($idAmi1,$idAmi2,$_pseudo)
  {
      $bdd = bdd();
     // nous vérifions ici que le pseudo entré n'est pas le même que celui de la session
          if($idAmi2 == $idAmi1)
              {
                echo " vous ne pouvez pas vous auto suivre";
              }
              else 
            {
               $i = 0;
            // on charge ensuite la bdd contenant les amis de la session
              $ajouterreponse = $bdd-> query('SELECT idAmi1,idAmi2,Pseudo
                                              from amis
                                              join Client on idAmi2 = idClient
                                              where idAmi1 = "' .$idAmi1.'"
                                             ');

              while ($ajouterdonnees = $ajouterreponse->fetch())
              {
                  // si le pseudo de la page est le même que celui contenu dans la bdd, on affiche le message, vous suivez  déjà et on incrémente i.
                  if($ajouterdonnees['Pseudo'] == $_pseudo)
                  {
                    echo " Vous suivez déjà " . $_pseudo;
                    $i++;
                  }
                  
              }
              //Si i = 0, le pseudo rentré n'est pas dans la bdd des amis et n'est pas le meme que celui de la session, on peut donc l'ajoute à la base de données
              if($i==0)
              {
                  $query=$bdd->prepare('INSERT Into amis (`idAmi1`, `idAmi2`)  VALUES('.$idAmi1.','.$idAmi2.')  ' );
                  $query->execute();
                  $query->CloseCursor();
                  echo " Vous avez ajouter " . $_pseudo;
              }
            
            $ajouterreponse->closeCursor();}
  }

//La fonction va nous permettre de vérifier si le pseudo rentré en paramètre existe
  function pseudoExist($pseudo)
  {
  $bdd = bdd();
  $reponse = $bdd-> query('SELECT * from client where pseudo="' .$pseudo .'"');
  $donnees = $reponse->fetch();
  $reponse->closeCursor();
  if(isset($donnees['Pseudo']))
  {
   
    return true;
  }else
  {
    
    return false;
  }

  }
?>