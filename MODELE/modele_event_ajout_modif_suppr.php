<?php 


function ajouter_event($Stade,$idCreateur,$DateEvent,$NomEvent,$StadeCol,$nbParticipant)
{   //se connecter à la base de donnée
  
   $bdd = bdd();
   //Préparation de la requete 
   $req = $bdd->prepare('INSERT INTO `event`(`Stade`, `idCreateur`, `Date`, `NomEvent`, `Stadecol`, `nbParticipant`) VALUES (:Stade, :idCreateur, :Date, :NomEvent, :Stadecol, :nbParticipant)');
    
    //éxécution de la requete
    $req->execute(array(
    'Stade' => $Stade,
    'idCreateur' => $idCreateur,
    'Date' => $DateEvent,
    'NomEvent' => $NomEvent,
    'Stadecol' => $StadeCol,
    'nbParticipant' => $nbParticipant
    ));

    $req->closeCursor();
}

function modifier_event($Stade,$idEvent,$DateEvent,$NomEvent,$StadeCol,$nbParticipant) {
  
  setStadeEvent($idEvent, $Stade);
  setDateEvent($idEvent, $DateEvent);
  setNomEvent($idEvent, $NomEvent);
  setParticipantEvent($idEvent, $nbParticipant);

}

function supprimer_event($idevent) {
  $bdd = bdd();
    //Préparation de la requete 
    $req = $bdd->prepare('DELETE FROM event WHERE idEvent = "'. $idevent .'" ');
    
    //éxécution de la requete
    $req->execute();
    $req->closeCursor();

}

