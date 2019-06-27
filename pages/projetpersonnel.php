<?php $title = "Projet personnel" ; ?>

<h2>Projet personnel</h2>
		<ul>
		<?php
					
					// lecture de la table projets
							$sql = "SELECT libelle,date_fin,description,url,chemin FROM projets P,images I WHERE P.id_p = i.id_p AND P.id_cat = '5' ";
							foreach ($bdd->query($sql) as $row) {
					//pour chaque réalisation : 
					echo '<article class="thumb">
							<h2>'.$row['libelle'].'</h2>
							<p>'.$row['description'].'</p>
							<a href="'.$row['url'].'" class="image" target=_blank><img src="'.$row['chemin'].'" alt="" /></a>
						</article>';
							}
					?>
		</ul>