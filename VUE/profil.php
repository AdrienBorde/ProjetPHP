<?php 

$_pseudo = $_GET["pseudo"];
$_action = $_GET["action"];
echo $_action;
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
        switch($_action)
        {
          case "consulter":
          require('VUE/profil/profil_consulter.php');
          break;
          case "modifier":
          echo "Vous etes dans la partie modifier";
          if(empty($_POST['sent']))
          {
            if(strcmp($_pseudo,$_SESSION['pseudo']) ==0 )
          {
            echo " c'est votre compte";
            // réalisation du formulaire de modification
            ?>
            <form method="post" action="<?php echo "pageProfil.php?pseudo=" . $donnees['Pseudo'] ."&action=modifier" ?>" >
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
              <SELECT name="poste" value="type_donn"size="1">
              <OPTION>Tous </OPTION> 
              <OPTION>Gardien </OPTION> 
              <OPTION>Defenseur </OPTION> 
              <OPTION>Milieu </OPTION>
              <OPTION>Attaquant  </OPTION>
              </SELECT><br />   
                    


              <label for="avatar">changer votre avatar:</label>
              <input type="file" name="avatar" id="avatar" />
              (Taille max : 10 ko)<br /><br />
              <label><input type="checkbox" name="delete" value="Delete" />
              Supprimer l'avatar</label><br />
              Avatar actuel :
              <img src="img/avatar/<?php echo $donnees['Avatar']?>"
              width="180px" height="130px" alt="pas d avatar" /><br /><br />

             <label for="signature">Description :</label><br />
             <textarea cols="40" rows="4" name="signature" id="signature">
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
            echo " vous venez d'envoyer le form";

         
          
            //partie traitement des modification
           $i = 0;
            $signature = $_POST['signature'];
            $Nom = $_POST['Nom'];
            $prenom = $_POST['prenom'];
            $ville = $_POST['ville'];
            $birth = $_POST['birth'];
            $poste = $_POST['poste'];
            echo $Nom;


            
    echo '<p><i>Vous êtes ici</i> : <a href="./index.php">Index du forum</a> --> Modification du profil';
    echo '<h1>Modification d\'un profil</h1>';

 
    if ($i == 0) // Si $i est vide, il n'y a pas d'erreur
    {
     /*   if (!empty($_FILES['avatar']['size']))
        {
                $nomavatar=move_avatar($_FILES['avatar']);
                $query=$db->prepare('UPDATE forum_membres
                SET membre_avatar = :avatar 
                WHERE membre_id = :id');
                $query->bindValue(':avatar',$nomavatar,PDO::PARAM_STR);
                $query->bindValue(':id',$id,PDO::PARAM_INT);
                $query->execute();
                $query->CloseCursor();
        }
 
        //Une nouveauté ici : on peut choisis de supprimer l'avatar
        if (isset($_POST['delete']))
        {
                $query=$db->prepare('UPDATE forum_membres
    SET membre_avatar=0 WHERE membre_id = :id');
                $query->bindValue(':id',$id,PDO::PARAM_INT);
                $query->execute();
                $query->CloseCursor();
        }*/
 
        echo'<h1>Modification terminée</h1>';
        echo'<p>Votre profil a été modifié avec succès !</p>';
        echo'<p>Cliquez <a href="./index.php">ici</a> 
        pour revenir à la page d accueil</p>';
 
        //On modifie la table
 
        $query=$bdd->prepare('UPDATE Client
        SET  Nom = :nom, Prenom =:prenom,Birth= :birth, Ville= :ville, Poste= :poste
        WHERE pseudo="' .$donnees['Pseudo'].'"');
        $query->bindValue(':nom',$Nom,PDO::PARAM_STR);
        $query->bindValue(':prenom',$prenom,PDO::PARAM_STR);
        $query->bindValue(':birth',$birth,PDO::PARAM_STR);
        $query->bindValue(':ville',$ville,PDO::PARAM_STR);
        $query->bindValue(':poste',$poste,PDO::PARAM_STR);
        $query->execute();
        $query->CloseCursor();
    }
    else
    {
        echo'<h1>Modification interrompue</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites pendant la modification du profil</p>';
        echo'<p>'.$i.' erreur(s)</p>';

        echo'<p> Cliquez <a href="./voirprofil.php?action=modifier">ici</a> pour recommencer</p>';
    }



          }
        


        break;


        }



         ?>



	</div>