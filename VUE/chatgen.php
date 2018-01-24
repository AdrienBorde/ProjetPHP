<aside class="col-2 mx-auto" id="chatgen">


                    <h3>Partage ta passion !</h3>   
			    <?php if(isset($_SESSION['id'])) 
			    {
					?>

			    <form action="VUE/chatgen_post.php" method="post">
			        <p>
			        <?php echo $_SESSION['pseudo'];
			        ?>
			        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

			        <input type="submit" value="Envoyer" />
				</p>
			    </form>

				<?php
				}
				$bdd = bdd();

				// Récupération des 10 derniers messages
				$reponse = $bdd->query('SELECT Pseudo, message FROM chatgen ORDER BY idMessage DESC LIMIT 0, 10');

				// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
				while ($donnees = $reponse->fetch())
				{
					echo '<p><strong>' . htmlspecialchars($donnees['Pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
				}

				$reponse->closeCursor();

				?>
          
                </aside>
</div>
