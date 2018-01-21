<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css\style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <title>WHAT THE FOOT</title>
    </head>
    <body>
        <!-- navbar -->
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <a class="navbar-brand" id="whatthefoot" href="#">WhatTheFoot</a>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
			      <li class="nav-item active">
			        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?php 
                                        if (isset($_SESSION['pseudo'])) 
                                        echo "pageProfil.php?pseudo=" . $_SESSION['pseudo'] ."&action=consulter"
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
		    <form class="form-inline my-2 my-lg-0">
			      <input class="form-control mr-sm-2" type="text" placeholder="Search">
			      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    </form>
	  </div>
</nav>

        <div id="bloc_page">



            <header>                
                <div class="row">
                    
                    <div class="col-3 mx-auto" id="titre_principal">
                        <h1>WhatTheFoot</h1> 
                    </div>

                    
                    <div class="col-3 mx-auto">
                        <nav id="menu">
                            <ul>
                                <li><a href="index.php">Accueil</a></li>
                                <li><a href="
                                    <?php 
                                        if (isset($_SESSION['pseudo'])) 
                                        echo "pageProfil.php?pseudo=" . $_SESSION['pseudo'] ."&action=consulter"
                                        ?> 

                                        "> Mon Profil</a></li>
                                <li><a href="
                                        <?php 
                                        if (isset($_SESSION['pseudo'])) 
                                        echo "pageEvent.php"
                                        ?> 
                                    ">Evenements</a></li>
                                <li><a href="
                                        <?php 
                                        if (isset($_SESSION['pseudo'])) 
                                        echo "xml_parser.php"
                                        ?> 
                                    ">Mise à jour</a></li>
                                <li><a href="
                                        <?php 
                                        if (isset($_SESSION['pseudo'])) 
                                        echo "marker.xml"
                                        ?> 
                                    ">XML Stade</a></li>

                                <li><a href="#">A propos</a></li>
                            </ul>
                        </nav>
                    </div>
               