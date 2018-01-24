<?php

// ici on vérifie que l'utilisateur à appuyer sur le bouton d'inscription à un événement.
if(isset($_POST['eventinscription']))
{
	//on vérifie ensuite s'il n'est pas déjà inscrit à l'événement
	if(!deja_inscrit($_SESSION['id'],$_POST['idEvent']))
	{
		
		
		//on vérifie ensuite si l'événement n'est pas complet
		if(!eventcomplet($_POST['idEvent']))
			{
					// Si tout est ok, l'utilisateur est inscrit à l'événement
					inscriptionEvent($_SESSION['id'],$_POST['idEvent']);
				}
		
		//Si l'événement est complet, on affiche une alerte javascript à l'utilisateur pour l'informé
		else {echo '<script>
					alert("Désolé, l\'évènement est complet ");
				</script>';}
		
	}
	//Si l'utilisateur est déjà inscrit à cet événement', on affiche une alerte javascript à l'utilisateur pour l'informé
	else {echo '<script>
					alert("Vous êtes déjà inscrit");
				</script>';}
}



// ici on vérifie que l'utilisateur à appuyer sur le bouton d'inscription à un événement.
if(isset($_POST['desinscription'])) 
{
	// l'utilisateur est alors désinscrit de l'événement en paramètre (idEventDes)
	desinscription($_SESSION['id'],$_POST['idEventDes']);
	
}


// ici on vérifie que l'utilisateur à appuyer sur le bouton de validation du formulaire de création d'événement
if(isset($_POST['eventcreer'])) 
{
	// On utilise alors la fonction ajouter_event avec en paramètre les différents arguments nécessaire à la création d'un event. La date nécessitant un format spécial, nous utilisons les fonctions date_format et date_create
	ajouter_event(getStadeid($_POST['stade']),
	$_SESSION['id'],
	date_format(date_create($_POST['date']), "Y/m/d H:i"),
	$_POST['nomevent'],
	'null',
	$_POST['nbparticipant']);


	// Lors de la création de l'événement, on inscrit également l'utilisateur qui le créer à son propre événement de manière logique.
	inscriptionEvent($_SESSION['id'],getIdEvent($_POST['nomevent'], date_format(date_create($_POST['date']), "Y/m/d H:i")));

}


// ici on vérifie que l'utilisateur à appuyer sur le bouton de validation du formulaire de modification d'événement
if(isset($_POST['eventmodif'])) 
{
	// On utilise alors la fonction modifier_event avec en paramètre les différents arguments nécessaire à la modification de l'evenement.
	modifier_event(getStadeid($_POST['stade']), 
	$_SESSION['ideventmodif'],
	date_format(date_create($_POST['datemodif']), "Y/m/d H:i"),
	$_POST['nommodifevent'],
    'null',
    $_POST['nbparticipantmodif']);

}


// ici on vérifie que l'utilisateur à appuyer sur le bouton de validation de suppression de l'événement
if(isset($_POST['supprimerevent'])) 
{
	//l'événement est alors supprimé à l'aide de la fonction suprimer_event
	supprimer_event($_POST['idEvent']);
		
}

?>