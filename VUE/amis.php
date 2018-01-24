                <div class="col-4 mx-auto" id="amis">
                    <h4>Mes amis
                    </h4>
                        <div id="liste_amis">
                            <ul>
                                <?php 
                                // va appeler la fonction listami pour lister les amis si la personne est connecté
                                    if(isset($_SESSION['id']))
                                    {
                                        listeAmis();
                                    }
                                    else 
                                    {
                                        echo "Vous n'êtes pas connecté";
                                    }
                            ?>
                            </ul>
                        </div>


                        <form class="form-inline my-2 my-lg-0 form-amis"  action="pageProfil.php" >
                            <input class="form-control mr-sm-2" type="text" placeholder="Rechercher un joueur" name="pseudo">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                         </form>
                </div>
        </div>