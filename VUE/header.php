<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css\style.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>WHAT THE FOOT</title>
    </head>
    <body>
        <div id="bloc_page">



            <header>                
                <div class="row">
                    
                    <div class="col-3" offset-1 id="titre_principal">
                        <h1>WhatTheFoot</h1> 
                    </div>

                    
                    <div class="col-3">
                        <nav id="menu">
                            <ul>
                                <li><a href="index.php">Accueil</a></li>
                                <li><a href="<?php echo "pageProfil.php?pseudo=".$_SESSION['pseudo'] ?> "> Mon Profil</a></li>
                                <li><a href="#">Evenement</a></li>
                                <li><a href="#">A propos</a></li>
                            </ul>
                        </nav>
                    </div>
               