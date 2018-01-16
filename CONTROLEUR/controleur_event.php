<?php

if(isset($_POST['eventinscription']))
{
	if(!deja_inscrit($_SESSION['id'],$_POST['idEvent']))
	{
		inscriptionEvent($_SESSION['id'],$_POST['idEvent']);
	}
	else {echo "déjà inscris";}
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

?>