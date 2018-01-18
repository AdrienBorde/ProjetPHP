<?php


function inscriptionEvent($idClient,$idEvent) {
  $bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('INSERT INTO participant(IdEvent, IdParticipant) VALUES(:IdEvent,:IdParticipant)');
    
    //éxécution de la requete
    $req->execute(array('IdEvent' => $idEvent,'IdParticipant' => $idClient));
    $req->closeCursor();
}

function desinscription($idClient,$idEvent) {
  $bdd = bdd();
    //Préparation de la requete 
    $req = $bdd->prepare('DELETE FROM participant WHERE IdParticipant = "'. $idClient .'" AND IdEvent = "'. $idEvent .'" ');
    
    //éxécution de la requete
    $req->execute();
    $req->closeCursor();
}

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


function nombreInscrits($idevent) {
  $bdd = bdd();

  $reponse = $bdd->query('SELECT COUNT(IdParticipant) as nbr FROM participant WHERE IdEvent = "' .$idevent. '" ');
  $reponse->execute();
  $donnees = $reponse->fetch();
  return $donnees['nbr'];

  }

  
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

