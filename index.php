<?php 

session_start();


include('connexionsql.php');
include('CONTROLEUR/controleur.php');

require('VUE/header.php');
require('vue/sug_events.php');
require('vue/map.php');
require('vue/sug_amis.php');
require('vue/derniermatch.php');
require('vue/amis.php');
require('vue/footer.php');

 ?>

