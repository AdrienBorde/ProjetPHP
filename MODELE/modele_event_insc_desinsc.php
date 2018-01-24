<?php

// Cette fonction utilise une requete SQL INSERT qui permet d'inscrire l'utilisateur connecté (via son id) à l'événement concerné dans la table participant
function inscriptionEvent($idClient,$idEvent) {
  $bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('INSERT INTO participant(IdEvent, IdParticipant) VALUES(:IdEvent,:IdParticipant)');
    
    //éxécution de la requete
    $req->execute(array('IdEvent' => $idEvent,'IdParticipant' => $idClient));
    $req->closeCursor();
}

// Cette fonction utilise une requete SQL DELETE qui permet de supprimer l'utilisateur connecté (via son id) à l'événement concerné dans la table participant
function desinscription($idClient,$idEvent) {
  $bdd = bdd();
    //Préparation de la requete 
    $req = $bdd->prepare('DELETE FROM participant WHERE IdParticipant = "'. $idClient .'" AND IdEvent = "'. $idEvent .'" ');
    
    //éxécution de la requete
    $req->execute();
    $req->closeCursor();
}

// Cette fonction vérifie si l'id du client est déjà associé avec l'event entré en paramètre, elle retourne true si l'utilisateur est déjà inscrit
function deja_inscrit($idClient,$idEvent){
// se connecter à la base de donnée
  $bdd = bdd();
  $reponse = $bdd->query('SELECT IdParticipant FROM participant
              WHERE IdEvent = "'. $idEvent .'" ');

  while ($donnees = $reponse->fetch())
  {
     if ($donnees['IdParticipant'] == $idClient)
     {
      return true;  
     }
     
        
  }
  return false;
  $reponse->closeCursor();
  }

// Cette fonction retour le nombre d'inscrit à un événement, on y passe le paramètre idEvent, puis on compte les idParticipants associés à l'event
function nombreInscrits($idevent) {
  $bdd = bdd();

  $reponse = $bdd->query('SELECT COUNT(IdParticipant) as nbr FROM participant WHERE IdEvent = "' .$idevent. '" ');
  $reponse->execute();
  $donnees = $reponse->fetch();
  return $donnees['nbr'];

  }

// Cette fonction compare le nombre d'inscrit avec le nombre de participant total de l'événement, elle retourne true si ils sont égaux pour indiquer que l'événement est complet
function eventcomplet($idevent) {

    if(nombreInscrits($idevent) == getnbParticipantEvent($idevent))
      {
        return true;
        }
    else
      {
        return false;
        }
  }

