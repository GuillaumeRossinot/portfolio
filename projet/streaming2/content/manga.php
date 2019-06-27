        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="show-top-grids">
				<div class="col-sm-10 show-grid-left main-grids">
					<div class="recommended">
						<div class="recommended-grids english-grid">
							<div class="recommended-info">
								<div class="heading">
									<h3>Action/Aventure</h3>
								</div>
								<div class="heading-right">
									<a  href="#small-dialog8" class="play-icon popup-with-zoom-anim">Subscribe</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<?php
								$sql = "SELECT titre_f,duree_f,desc_f ,lien_f,chemin_f FROM film WHERE genre_f = 1 LIMIT 5";
								foreach ($bdd->query($sql) as $row) {
									//pour chaque réalisation : 
																		echo '<div class="col-md-3 resent-grid recommended-grid slider-first">
											<div class="resent-grid-img recommended-grid-img">
												<a href="single.html"><img src="'.$row['chemin_f'].'" alt="" width="250" height="250" /></a>
												<div class="time small-time slider-time">
													<p>'.$row['duree_f'].'</p>
												</div>
												<div class="clck small-clck">
													<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
												</div>
											</div>
											<div class="resent-grid-info recommended-grid-info">
												<h3><a href="single.html" class="title">'.$row['titre_f'].'</a></h3>
												<p>'.$row['desc_f'].'</p>
												<div class="slid-bottom-grids">
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
								';}
						?>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="recommended">
						<div class="recommended-grids">
							<div class="recommended-info">
								<div class="heading">
									<h3>Dramatique</h3>
								</div>
								<div class="heading-right">
									<a  href="#small-dialog8" class="play-icon popup-with-zoom-anim">Subscribe</a>
								</div>
								<div class="clearfix"> </div>
							</div>
														<?php
								$sql = "SELECT titre_f,duree_f,desc_f ,lien_f,chemin_f FROM film WHERE genre_f = 2 LIMIT 5";
								foreach ($bdd->query($sql) as $row) {
									//pour chaque réalisation : 
																		echo '<div class="col-md-3 resent-grid recommended-grid slider-first">
											<div class="resent-grid-img recommended-grid-img">
												<a href="single.html"><img src="'.$row['chemin_f'].'" alt="" width="250" height="250" /></a>
												<div class="time small-time slider-time">
													<p>'.$row['duree_f'].'</p>
												</div>
												<div class="clck small-clck">
													<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
												</div>
											</div>
											<div class="resent-grid-info recommended-grid-info">
												<h3><a href="single.html" class="title">'.$row['titre_f'].'</a></h3>
												<p>'.$row['desc_f'].'</p>
												<div class="slid-bottom-grids">
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
								';}
						?>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="recommended">
						<div class="recommended-grids">
							<div class="recommended-info">
								<div class="heading">
									<h3>Fantastique et science-fiction</h3>
								</div>
								<div class="heading-right">
									<a  href="#small-dialog8" class="play-icon popup-with-zoom-anim">Subscribe</a>
								</div>
								<div class="clearfix"> </div>
							</div>
														<?php
								$sql = "SELECT titre_f,duree_f,desc_f ,lien_f,chemin_f FROM film WHERE genre_f = 3 LIMIT 5";
								foreach ($bdd->query($sql) as $row) {
									//pour chaque réalisation : 
																		echo '<div class="col-md-3 resent-grid recommended-grid slider-first">
											<div class="resent-grid-img recommended-grid-img">
												<a href="single.html"><img src="'.$row['chemin_f'].'" alt="" width="250" height="250" /></a>
												<div class="time small-time slider-time">
													<p>'.$row['duree_f'].'</p>
												</div>
												<div class="clck small-clck">
													<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
												</div>
											</div>
											<div class="resent-grid-info recommended-grid-info">
												<h3><a href="single.html" class="title">'.$row['titre_f'].'</a></h3>
												<p>'.$row['desc_f'].'</p>
												<div class="slid-bottom-grids">
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
								';}
						?>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="recommended">
						<div class="recommended-grids">
							<div class="recommended-info">
								<div class="heading">
									<h3>Historique</h3>
								</div>
								<div class="heading-right">
									<a  href="#small-dialog8" class="play-icon popup-with-zoom-anim">Subscribe</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						<?php
								$sql = "SELECT titre_f,duree_f,desc_f ,lien_f,chemin_f FROM film WHERE genre_f = 4 LIMIT 5";
								foreach ($bdd->query($sql) as $row) {
									//pour chaque réalisation : 
																		echo '<div class="col-md-3 resent-grid recommended-grid slider-first">
											<div class="resent-grid-img recommended-grid-img">
												<a href="single.html"><img src="'.$row['chemin_f'].'" alt="" width="250" height="250" /></a>
												<div class="time small-time slider-time">
													<p>'.$row['duree_f'].'</p>
												</div>
												<div class="clck small-clck">
													<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
												</div>
											</div>
											<div class="resent-grid-info recommended-grid-info">
												<h3><a href="single.html" class="title">'.$row['titre_f'].'</a></h3>
												<p>'.$row['desc_f'].'</p>
												<div class="slid-bottom-grids">
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
								';}
						?>
							<div class="clearfix"> </div>
					</div>
				</div>
					<div class="recommended">
						<div class="recommended-grids">
							<div class="recommended-info">
								<div class="heading">
									<h3>Animation</h3>
								</div>
								<div class="heading-right">
									<a  href="#small-dialog8" class="play-icon popup-with-zoom-anim">Subscribe</a>
								</div>
								<div class="clearfix"> </div>
							</div>
														<?php
								$sql = "SELECT titre_f,duree_f,desc_f ,lien_f,chemin_f FROM film WHERE genre_f = 5 LIMIT 5";
								foreach ($bdd->query($sql) as $row) {
									//pour chaque réalisation : 
																		echo '<div class="col-md-3 resent-grid recommended-grid slider-first">
											<div class="resent-grid-img recommended-grid-img">
												<a href="single.html"><img src="'.$row['chemin_f'].'" alt="" width="250" height="250" /></a>
												<div class="time small-time slider-time">
													<p>'.$row['duree_f'].'</p>
												</div>
												<div class="clck small-clck">
													<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
												</div>
											</div>
											<div class="resent-grid-info recommended-grid-info">
												<h3><a href="single.html" class="title">'.$row['titre_f'].'</a></h3>
												<p>'.$row['desc_f'].'</p>
												<div class="slid-bottom-grids">
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
								';}
						?>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="recommended">
						<div class="recommended-grids">
							<div class="recommended-info">
								<div class="heading">
									<h3>Comédie</h3>
								</div>
								<div class="heading-right">
									<a  href="#small-dialog8" class="play-icon popup-with-zoom-anim">Subscribe</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						<?php
								$sql = "SELECT titre_f,duree_f,desc_f ,lien_f,chemin_f FROM film WHERE genre_f = 6 LIMIT 5";
								foreach ($bdd->query($sql) as $row) {
									//pour chaque réalisation : 
																		echo '<div class="col-md-3 resent-grid recommended-grid slider-first">
											<div class="resent-grid-img recommended-grid-img">
												<a href="single.html"><img src="'.$row['chemin_f'].'" alt="" width="250" height="250" /></a>
												<div class="time small-time slider-time">
													<p>'.$row['duree_f'].'</p>
												</div>
												<div class="clck small-clck">
													<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
												</div>
											</div>
											<div class="resent-grid-info recommended-grid-info">
												<h3><a href="single.html" class="title">'.$row['titre_f'].'</a></h3>
												<p>'.$row['desc_f'].'</p>
												<div class="slid-bottom-grids">
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
								';}
						?>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="recommended">
						<div class="recommended-grids">
							<div class="recommended-info">
								<div class="heading">
									<h3>Policières et thrillers</h3>
								</div>
								<div class="heading-right">
									<a  href="#small-dialog8" class="play-icon popup-with-zoom-anim">Subscribe</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						<?php
								$sql = "SELECT titre_f,duree_f,desc_f ,lien_f,chemin_f FROM film WHERE genre_f = 7 LIMIT 5";
								foreach ($bdd->query($sql) as $row) {
									//pour chaque réalisation : 
										echo '<div class="col-md-3 resent-grid recommended-grid slider-first">
											<div class="resent-grid-img recommended-grid-img">
												<a href="single.html"><img src="'.$row['chemin_f'].'" alt="" width="250" height="250" /></a>
												<div class="time small-time slider-time">
													<p>'.$row['duree_f'].'</p>
												</div>
												<div class="clck small-clck">
													<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
												</div>
											</div>
											<div class="resent-grid-info recommended-grid-info">
												<h3><a href="single.html" class="title">'.$row['titre_f'].'</a></h3>
												<p>'.$row['desc_f'].'</p>
												<div class="slid-bottom-grids">
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
								';}
						?>
							<div class="clearfix"> </div>
						</div>
					</div>					