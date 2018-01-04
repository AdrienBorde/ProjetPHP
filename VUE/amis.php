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
                </div>
        </div>