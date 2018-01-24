<!-- Affiche de la navbar lorsque aucun utilisateur n'est connecté -->                    
<nav class="navbar my-nav navbar-toggleable-md navbar-inverse" style="background-color: green; margin-bottom: 30px;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" id="whatthefoot" href="#">WhatTheFoot</a>
     <!-- Menu de la Navbar -->
        <div class="collapse navbar-collapse menu-nav" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a> <!-- Lien Accueil -->
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php 
                                        if (isset($_SESSION['pseudo'])) 
                                        echo "pageProfil.php?pseudo=" . $_SESSION['pseudo'] /* Lien Profil */
                                        ?> ">Mon Profil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php 
                                        if (isset($_SESSION['pseudo'])) /* Lien Evènements */
                                        echo "pageEvent.php"
                                        ?> ">Evènements</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php 
                                        if (isset($_SESSION['pseudo'])) /* Lien Mise à jour des stades */
                                        echo "xml_parser.php"
                                        ?> ">Mise à jour</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php 
                                        if (isset($_SESSION['pseudo'])) /* Lien XML */
                                        echo "marker.xml"
                                        ?> ">XML Stade</a>
                  </li>
            </ul>
				    <!-- Formulaire/Bouton de déconnexion -->
				    <form class="form-inline my-2 my-lg-0"  action="index.php" method="post" id="deconnexion">
					      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="deco" value="Deconnexion">Deconnexion</button>
				    </form>

				    <!-- <form action="index.php" method="post" id="connexion">
		                            Pseudo : <input type="text" name="pseudo">
		                            Mot de passe : <input type="password" name="mdp">
		                            <input type="submit" name="connexion" value="Valider">
		                        </form> -->
		</div>
</nav>
</header>