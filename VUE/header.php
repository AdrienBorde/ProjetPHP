<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css\style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
            <link rel="canonical"
          href="https://craftpip.github.io/jquery-confirm"/>
          
        <title>WHAT THE FOOT</title>
    </head>
    <body>
        <!-- navbar -->
<nav class="navbar my-nav navbar-toggleable-md navbar-inverse" style="background-color: green;">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

 	 <a class="navbar-brand" id="whatthefoot" href="#">WhatTheFoot</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
			      <li class="nav-item active">
			        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?php 
                                        if (isset($_SESSION['pseudo'])) 
                                        echo "pageProfil.php?pseudo=" . $_SESSION['pseudo']
                                        ?> ">Mon Profil</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link " href="<?php 
                                        if (isset($_SESSION['pseudo'])) 
                                        echo "pageEvent.php"
                                        ?> ">Evènements</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link " href="<?php 
                                        if (isset($_SESSION['pseudo'])) 
                                        echo "xml_parser.php"
                                        ?> ">Mise à jour</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link " href="<?php 
                                        if (isset($_SESSION['pseudo'])) 
                                        echo "marker.xml"
                                        ?> ">XML Stade</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link " href="#">A propos</a>
			      </li>
		    </ul>
		    <form class="form-inline my-2 my-lg-0"  action="pageProfil.php" >
			      <input class="form-control mr-sm-2" type="text" placeholder="Pseudo" name="pseudo">
			      <input class="form-control mr-sm-2" type="text" placeholder="Mot de Passe" name="pseudo">
			      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Se connecter</button>
		    </form>
	  </div>
</nav>

       