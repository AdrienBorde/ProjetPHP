<?php

if(isset($_POST['eventinscription']))
{
	if(!deja_inscrit($_SESSION['id'],$_POST['idEvent']))
	{
		
		if(!eventcomplet($_POST['idEvent']))
			{
					inscriptionEvent($_SESSION['id'],$_POST['idEvent']);
				}
		else {echo '<script>
					alert("Désolé, l\'évènement est complet ");
				</script>';}
		
	}
	
	else {echo '<script>
					alert("Vous êtes déjà inscrit");
				</script>';}
}




if(isset($_POST['desinscription'])) 
{
	desinscription($_SESSION['id'],$_POST['idEventDes']);
	
}



if(isset($_POST['eventcreer'])) 
{
	ajouter_event(getStadeid($_POST['stade']),
	$_SESSION['id'],
	date_format(date_create($_POST['date']), "Y/m/d H:i"),
	$_POST['nomevent'],
	'null',
	$_POST['nbparticipant']);

	inscriptionEvent($_SESSION['id'],getIdEvent($_POST['nomevent'], date_format(date_create($_POST['date']), "Y/m/d H:i")));

}



if(isset($_POST['eventmodif'])) 
{
	modifier_event(getStadeid($_POST['stade']), 
	$_SESSION['ideventmodif'],
	date_format(date_create($_POST['datemodif']), "Y/m/d H:i"),
	$_POST['nommodifevent'],
    'null',
    $_POST['nbparticipantmodif']);

}



if(isset($_POST['supprimerevent'])) 
{
	supprimer_event($_POST['idEvent']);
	
}

?>