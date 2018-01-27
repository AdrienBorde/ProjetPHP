      <div class="col-7 mx-auto" id="profil">


<?php  
        //Nous modifions ici notre profil
        echo "Vous etes dans la partie modifier";
          if(empty($_POST['sent'])) // nous vérifions que nous n'avons pas déjà envoyé de formulaire
          {
            if(strcmp($_pseudo,$_SESSION['pseudo']) ==0 ) // nous vérifions que nous sommes bien sur notre compte
          {

            // réalisation du formulaire afin de modifier notre profil
            // les fonction php sont écrite dans le modele modele_profil.php et nous permets de recuperer les valeurs 
            // dans la base de données afin d'éviter de réécrire les informations où d'en effacer
            ?>
            <form  enctype="multipart/form-data" method="post" action="<?php echo "pageProfil.php?pseudo=" . $_pseudo ."&action=modifier" ?>"  >
              <fieldset><legend>Presentation</legend>

              <label for="nom">Nom :</label>
              <input type="text" name="Nom" id="Nom"
              value="<?php echo $nom ?>"  /><br />

              <label for="prenom">Prénom :</label>
              <input type="text" name="prenom" id="prenom"
              value="<?php echo $prenom ?>"  /><br /> 

              <label for="ville">Ville :</label>
              <input type="text" name="ville" id="ville"
              value="<?php echo $ville ?>"  /><br /> 

              <label for="date de naissance">date de naissance :</label>
              <input type="date" name="birth" id="birth"
              value="<?php echo $birth ?>"  /><br />

              <label for="poste">Poste :</label>
              <SELECT name="poste" value="<?php echo $poste?>" size="1">
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
              <img src="css/img/avatar/<?php echo $avatar?>"
              width="180px" height="130px" alt="pas d avatar" /><br /><br />

             <label for="descritption">Description :</label><br />
             <textarea cols="40" rows="4" name="description" id="description">
             <?php echo $description;?>
             </textarea>

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
            modifierclient($_POST['description'],$_POST['Nom'],$_POST['prenom'],$_POST['ville'],$_POST['birth'],$_POST['poste'],$_SESSION['id'],$_SESSION['pseudo']);

          }
        ?>

  </div>