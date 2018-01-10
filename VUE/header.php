<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css\style.css">
        <link href="css/bootstrap.css" rel="stylesheet">
        <title>WHAT THE FOOT</title>
    </head>
    <body>
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
                                <li><a href="#">A propos</a></li>
                            </ul>
                        </nav>
                    </div>
               