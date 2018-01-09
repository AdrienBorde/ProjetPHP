<?php 

$_pseudo = $_GET["pseudo"];
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
           		//Si le pseudo existe , on va afficher les informations du profil
                if(isset($donnees['Pseudo']) )
                {
	       ?>
					<p> Profil de <?php echo $donnees['Pseudo']    ;   
                   //Permet de voir si vous etes sur votre profil pour pouvoir le modifier aprés si besoin 
                if(strcmp($donnees['Pseudo'], $_SESSION['pseudo']) == 0)
                {
                  ?> <a href="#"><img src="img/reglage.jpg" alt= "modifier votre profil" width="30px" height="30px"></a>
             <?php   }                       
                  ?>  </p>
         <?php if(isset($donnees['Avatar'])) { ?> 
         <img src="img/avatar/<?php echo $donnees['Avatar'] ?>.png"  width="180px" height="130px"/>
         <?php }  else { ?>

         <img src="img/avatar/avatar_defaut.png" width="180px" height="130px" /> <?php } ?>
          
          <p> Prénom : <?php if(isset($donnees['Prenom'])){
                                   echo $donnees['Prenom'];
                                 } else { 
                                    echo "il n'y a pas de prenom ";
                                  }
           ?></p>

          <p> Nom : <?php if(isset($donnees['Nom'])){
                                   echo $donnees['Nom'];
                                 } else { 
                                    echo "il n'y a pas de nom ";
                                  }
            ?></p>
          
          <p> Date de naissance: <?php if(isset($donnees['Birth'])){
                                   echo $donnees['Birth'];
                                 } else { 
                                    echo "il n'y a pas de date de naissance ";
                                  }
            ?></p>
         
          <p> Ville : <?php if(isset($donnees['Ville'])){
                                   echo $donnees['Ville'];
                                 } else { 
                                    echo "il n'y a pas de ville ";
                                  }
            ?></p>
          
          <p> Poste préférentiel : <?php if(isset($donnees['Poste'])){
                                   echo $donnees['Poste'];
                                 } else { 
                                    echo "il n'y a pas de poste ";
                                  }
            ?></p>          
					


          <p> Mail: <?php echo $donnees['mail']?> </p>
         

          <p> Description : <?php if(isset($donnees['Description'])){
                                   echo $donnees['Description'];
                                 } else { 
                                    echo "il n'y a pas de description";
                                  }
            ?></p>

          




          <?php

                }
                else
                	// on affiche un message d'erreur nous expliquant que le profil n'existe pas 
                { ?>
                	<p> Ce profil n'existe pas </p>
           <?php
                }
           ?>
	</div>