<?php

if(isset($_POST['eventinscription']))
{
	inscriptionEvent($_SESSION['id'],$_POST['idEvent']);
}

?>