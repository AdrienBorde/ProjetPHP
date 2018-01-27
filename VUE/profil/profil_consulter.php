  <div class="col-7 mx-auto" id="profil">
					<p> Profil de <?php echo $_GET['pseudo'];   
                   //Permet de voir si vous etes sur votre profil pour pouvoir le modifier aprés si besoin 
                if(strcmp($_GET['pseudo'], $_SESSION['pseudo']) == 0)
                {
                  ?> <a href="<?php echo "pageProfil.php?pseudo=" . $_GET['pseudo'] ."&action=modifier"?> " class="btn " role="button">
                  <button type="button" class="btn "> <img src="css/img/reglage.png" alt= "modifier votre profil" width="30px" height="30px"> Modifier</button>
                  </a>
                
             <?php  
              }

             else 
              //sinon nous ne sommes pas sur notre compte, nous pouvons donc rajouter le profil à notre liste d'ami
                      { ?>
                        <a href="<?php echo "pageProfil.php?pseudo=" . $_GET['pseudo'] ."&action=ajouter"?> ">  
                        <button type="button" class="btn btn-success">Ajouter</button>                     
                       </a>
                        <?php
                      }                       
                  echo "</p>";
                  
        
         //Permet de vérifier que vous avez déjà mis une photo de profil
          if(  $avatar !== null ) { ?> 
         <img src="css/img/avatar/<?php echo $avatar ?>"  width="180px" height="130px"/>
         <?php }  else { ?>

         <img src="css/img/avatar/0.png" width="180px" height="130px" /> <?php } ?>
          
          <p> Prénom : <?php    
            // on regarde si un prénom a été renseigné sinon on affiche un message par défaut
             if(isset($prenom)){
                echo $prenom;
               } else { 
             echo "il n'y a pas de prenom ";
            }
           ?></p>

          <p> Nom : <?php // on regarde si un Nom a été renseigné sinon on affiche un message par défaut
                                  if(isset($nom)){
                                   echo $nom;
                                 } else { 
                                    echo "il n'y a pas de nom ";
                                  }
            ?></p>
          
          <p> Date de naissance: <?php  // on regarde si une date de naissance a été renseigné sinon on affiche un message par défaut
                                  if(isset($birth)){
                                   echo $birth;
                                 } else { 
                                    echo "il n'y a pas de date de naissance ";
                                  }
            ?></p>
         
          <p> Ville : <?php // on regarde si une ville a été renseigné sinon on affiche un message par défaut
                                  if(isset($ville)){
                                   echo $ville;
                                 } else { 
                                    echo "il n'y a pas de ville ";
                                  }
            ?></p>
          
          <p> Poste préférentiel : <?php  // on regarde si un poste a été renseigné sinon on affiche un message par défaut

                                  if(isset($poste)){
                                   echo $poste;
                                 } else { 
                                    echo "il n'y a pas de poste ";
                                  }
            ?></p>          
					


          <p> Mail: <?php // on affiche le mail de la personne
              echo $mail;?> </p>
         

          <p> Description : <?php  // on regarde si une description a été renseigné sinon on affiche un message par défaut  
                                   if(isset($description)){
                                   echo $description;
                                 } else { 
                                    echo "il n'y a pas de description";
                                  }
            ?>
        </p>
              
              </div>