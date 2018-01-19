        <?php      
          if($donnees['idClient'] == $_SESSION['id'])
              {
                echo " vous ne pouvez pas vous auto suivre";
              }
              else 
            {
            $i = 0;
              $ajouterreponse = $bdd-> query('SELECT idAmi1,idAmi2,Pseudo
                                              from amis
                                              join Client on idAmi2 = idClient
                                              where idAmi1 = "' .$_SESSION['id'].'"
                                             ');

              while ($ajouterdonnees = $ajouterreponse->fetch())
              {
                  if($ajouterdonnees['Pseudo'] == $_pseudo)
                  {
                    echo " Vous suivez déjà " . $_pseudo;
                    $i++;
                  }
                  
              }
              if($i==0)
              {
                  $query=$bdd->prepare('INSERT Into amis (`idAmi1`, `idAmi2`)  VALUES('.$_SESSION["id"].','.$donnees["idClient"].')  ' );
                  $query->execute();
                  $query->CloseCursor();
                  echo " Vous avez ajouter " . $_pseudo;
              }
            
            $ajouterreponse->closeCursor();}
      ?>