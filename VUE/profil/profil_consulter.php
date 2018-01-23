           <?php 
           		//Si le pseudo existe , on va afficher les informations du profil
                
	       ?>
					<p> Profil de <?php echo $donnees['Pseudo']    ;   
                   //Permet de voir si vous etes sur votre profil pour pouvoir le modifier aprés si besoin 
                if(strcmp($donnees['Pseudo'], $_SESSION['pseudo']) == 0)
                {
                  ?> <a href="<?php echo "pageProfil.php?pseudo=" . $donnees['Pseudo'] ."&action=modifier"?> " class="btn " role="button">
                  <button type="button" class="btn "> <img src="css/img/reglage.png" alt= "modifier votre profil" width="30px" height="30px"> Modifier</button>
                  </a>
                

             <?php   }else 
                      { ?>

                        <a href="<?php echo "pageProfil.php?pseudo=" . $donnees['Pseudo'] ."&action=ajouter"?> ">  
                        <button type="button" class="btn btn-success">Ajouter</button>                     
                       </a>
                        <?php
                      }                       
                  echo "</p>";
        
         //Permet de vérifier que vous avez déjà mis une photo de profil
          if(isset($donnees['Avatar'])) { ?> 
         <img src="css/img/avatar/<?php echo $donnees['Avatar'] ?>"  width="180px" height="130px"/>
         <?php }  else { ?>

         <img src="css/img/avatar/0.png" width="180px" height="130px" /> <?php } ?>
          
          <p> Prénom : <?php      // on regarde si un prénom a été renseigné sinon on affiche un message par défaut
                                  if(isset($donnees['Prenom'])){
                                   echo $donnees['Prenom'];
                                 } else { 
                                    echo "il n'y a pas de prenom ";
                                  }
           ?></p>

          <p> Nom : <?php // on regarde si un Nom a été renseigné sinon on affiche un message par défaut
                                  if(isset($donnees['Nom'])){
                                   echo $donnees['Nom'];
                                 } else { 
                                    echo "il n'y a pas de nom ";
                                  }
            ?></p>
          
          <p> Date de naissance: <?php  // on regarde si une date de naissance a été renseigné sinon on affiche un message par défaut
                                  if(isset($donnees['Birth'])){
                                   echo $donnees['Birth'];
                                 } else { 
                                    echo "il n'y a pas de date de naissance ";
                                  }
            ?></p>
         
          <p> Ville : <?php // on regarde si une ville a été renseigné sinon on affiche un message par défaut
                                  if(isset($donnees['Ville'])){
                                   echo $donnees['Ville'];
                                 } else { 
                                    echo "il n'y a pas de ville ";
                                  }
            ?></p>
          
          <p> Poste préférentiel : <?php  // on regarde si un poste a été renseigné sinon on affiche un message par défaut

                                  if(isset($donnees['Poste'])){
                                   echo $donnees['Poste'];
                                 } else { 
                                    echo "il n'y a pas de poste ";
                                  }
            ?></p>          
					


          <p> Mail: <?php // on affiche le mail de la personne
              echo $donnees['mail']?> </p>
         

          <p> Description : <?php  // on regarde si une description a été renseigné sinon on affiche un message par défaut  
                                   if(isset($donnees['Description'])){
                                   echo $donnees['Description'];
                                 } else { 
                                    echo "il n'y a pas de description";
                                  }
            ?>
        </p>
              