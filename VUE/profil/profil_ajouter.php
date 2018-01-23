        <?php      
        // nous vérifions ici que le pseudo entré n'est pas le même que celui de la session
          if($donnees['idClient'] == $_SESSION['id'])
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
                                              where idAmi1 = "' .$_SESSION['id'].'"
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
                  $query=$bdd->prepare('INSERT Into amis (`idAmi1`, `idAmi2`)  VALUES('.$_SESSION["id"].','.$donnees["idClient"].')  ' );
                  $query->execute();
                  $query->CloseCursor();
                  echo " Vous avez ajouter " . $_pseudo;
              }
            
            $ajouterreponse->closeCursor();}
      ?>