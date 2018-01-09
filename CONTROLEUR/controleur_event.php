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

?>