<?php  
        //Nous modifions ici notre profil
        echo "Vous etes dans la partie modifier";
          if(empty($_POST['sent'])) // nous vérifions que nous n'avons pas déjà envoyé de formulaire
          {
            if(strcmp($_pseudo,$_SESSION['pseudo']) ==0 ) // nous vérifions que nous sommes bien sur notre compte
          {

            // réalisation du formulaire afin de modifier notre profil
            ?>
            <form  enctype="multipart/form-data" method="post" action="<?php echo "pageProfil.php?pseudo=" . $donnees['Pseudo'] ."&action=modifier" ?>"  >
              <fieldset><legend>Presentation</legend>

              <label for="nom">Nom :</label>
              <input type="text" name="Nom" id="Nom"
              value="<?php echo $donnees['Nom'] ?>"  /><br />

              <label for="prenom">Prénom :</label>
              <input type="text" name="prenom" id="prenom"
              value="<?php echo $donnees['Prenom'] ?>"  /><br /> 

              <label for="ville">Ville :</label>
              <input type="text" name="ville" id="ville"
              value="<?php echo $donnees['Ville'] ?>"  /><br /> 

              <label for="date de naissance">date de naissance :</label>
              <input type="date" name="birth" id="birth"
              value="<?php echo $donnees['Birth'] ?>"  /><br />

              <label for="poste">Poste :</label>
              <SELECT name="poste" value="<?php echo $donnees['Poste']?>" size="1">
              <OPTION>Tous </OPTION> 
              <OPTION>Gardien </OPTION> 
              <OPTION>Defenseur </OPTION> 
              <OPTION>Milieu </OPTION>
              <OPTION>Attaquant  </OPTION>
              </SELECT><br />   
                    
              <label for="avatar">changer votre avatar (format .jpg & jpeg seulement):<br /></label>
              <input type="file" name="avatar" id="avatar" />
              (Taille max : 2 mo)<br /><br />

              <label><input type="checkbox" name="delete" value="Delete" />
              Supprimer l'avatar</label><br />
              Avatar actuel :
              <img src="css/img/avatar/<?php echo $donnees['Avatar']?>"
              width="180px" height="130px" alt="pas d avatar" /><br /><br />

             <label for="descritption">Description :</label><br />
             <textarea cols="40" rows="4" name="description" id="description">
             <?php echo stripslashes($donnees['Description']) ?></textarea>

              <p>
              <input type="submit" value="Modifier son profil" />
              <input type="hidden" id="sent" name="sent" value="1" />
              </p></form>
            <?php
          }
          else{
            echo " vous n'etes pas sur votre compte";
          }
        }
          else 
          {         
            //partie traitement des modification
            //Déclaration des variable, que nous utiliserons pour modifier notre profil
            $i = 0;
            $description = $_POST['description'];
            $Nom = $_POST['Nom'];
            $prenom = $_POST['prenom'];
            $ville = $_POST['ville'];
            $birth = $_POST['birth'];
            $poste = $_POST['poste'];
            //extensions valide pour l'avatar
            $extensions_valides = array( 'jpg' , 'jpeg'  );
            //Poid de l'image max
            $maxsize = 2097152; 
            

            //nous vérifions qu'il y a bien un fichier qui a été envoyé comme avatar
             if(!(empty($_FILES['avatar']['tmp_name'])))
             {
                     $extension_upload = strtolower(substr(  strrchr($_FILES['avatar']['name'], '.')  ,1));  
                     $nomavatar = $donnees['idClient'].'.'.$extension_upload; 
                    
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
                WHERE pseudo="' .$donnees['Pseudo'].'"');
                $query->bindValue(':avatar',$nomavatar,PDO::PARAM_STR);
                $query->execute();
                $query->CloseCursor();

            }

        //Si l'utilisateur veut supprimer son avatar
        if (isset($_POST['delete']))
        {
                  $query=$bdd->prepare('UPDATE Client
      SET Avatar=0 WHERE pseudo="' .$donnees['Pseudo'].'"');
                  $query->execute();
                  $query->CloseCursor();
        }
 

 
        //On modifie la table Client avec les valeurs rentré par l'utilisateur 
 
        $query=$bdd->prepare('UPDATE Client
        SET  Nom = :nom, Prenom =:prenom,Birth= :birth, Ville= :ville, Poste= :poste, Description=:description
        WHERE pseudo="' .$donnees['Pseudo'].'"');
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
        echo'<p>Cliquez <a href="./index.php">ici</a> 
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
        ?>

