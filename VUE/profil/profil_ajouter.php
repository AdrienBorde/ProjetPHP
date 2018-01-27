      <div class="col-7 mx-auto" id="profil">

       <?php     
       //utilise la fonction qui vérifie si nous pouvons ajouter la personne en ami ou sinon affiche les messages d'erreur
       ajoutAmi($_SESSION['id'],
       getIdClient($_GET['pseudo']),
       $_GET['pseudo'] )
      ?>
        </div>