        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="top-grids">
					<div class="recommended-info">
						<h3>Série</h3>
					</div>
							<?php
								$sql = "SELECT id_se, titre_se,nomb_ep,desc_se ,lien_se FROM serie ORDER BY id_se DESC LIMIT 5";
								foreach ($bdd->query($sql) as $row) {
									$listFiles = glob('./images/uploaded/'.$row['id_se'].'_2*');
									if(isset($listFiles[0]) && !empty($listFiles[0])){
										$lienImage=$listFiles[0];
									}
									else
										$lienImage='';
									//pour chaque réalisation : 
									echo '<div class="col-md-3 resent-grid recommended-grid slider-first">
											<div class="resent-grid-img recommended-grid-img">
												<a href="index.php?p=viewsvideo&id_v='.$row['id_se'].'&type_v=2"><img src="'.$lienImage.'" alt=""  width="250" height="250" /></a>
											</div>
											<div class="resent-grid-info recommended-grid-info">
												<h3><a href="index.php?p=viewsvideo&id_v='.$row['id_se'].'&type_v=2" class="title">'.$row['titre_se'].'</a></h3>
												<p>'.$row['desc_se'].'</p>
												<div class="slid-bottom-grids">
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
								';}
						?>
					<div class="clearfix"> </div>
				</div>
						<!--<script src="js/responsiveslides.min.js"></script>
						 <script>
							// You can also use "$(window).load(function() {"
							$(function () {
							  // Slideshow 4
							  $("#slider3").responsiveSlides({
								auto: true,
								pager: false,
								nav: true,
								speed: 500,
								namespace: "callbacks",
								before: function () {
								  $('.events').append("<li>before event fired.</li>");
								},
								after: function () {
								  $('.events').append("<li>after event fired.</li>");
								}
							  });
						
							});
						  </script>-->
						  <?php
						  if(isset($_SESSION['connecte'])){
							  ?>
				<div class="recommended">
					<div class="recommended-grids">
						<div class="recommended-info">
							<h3>Suggestion serie :</h3>
						</div>
						<?php
								$requete = $bdd->query("SELECT * FROM serie WHERE id_se NOT IN(SELECT id_se FROM visionner WHERE id_u = ".$_SESSION['id_u'].") LIMIT 5");
								while($reponse = $requete->fetch()){
									$listFiles = glob('./images/uploaded/'.$reponse['id_se'].'_2*');
									if(isset($listFiles[0]) && !empty($listFiles[0])){
										$lienImage=$listFiles[0];
									}
									else
										$lienImage='';
									//pour chaque réalisation : 
																		echo '<div class="col-md-3 resent-grid recommended-grid slider-first">
											<div class="resent-grid-img recommended-grid-img">
												<a href="index.php?p=viewsvideo&id_v='.$reponse['id_se'].'&type_v=2"><img src="'.$lienImage.'" alt="" width="250" height="250" /></a>
											</div>
											<div class="resent-grid-info recommended-grid-info">
												<h3><a href="index.php?p=viewsvideo&id_v='.$reponse['id_se'].'&type_v=2" class="title">'.$reponse['titre_se'].'</a></h3>
												<p>'.$reponse['desc_se'].'</p>
												<div class="slid-bottom-grids">
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
								';}	
						?>
					</div>
						<div class="clearfix"> </div>
					</div>
				<?php 
						  }
				?>
				<div class="recommended">
					<div class="recommended-grids">
						<div class="recommended-info">
							<h3>Film</h3>
						</div>
						<?php
								$sql = "SELECT id_f,titre_f,desc_f ,lien_f FROM film ORDER BY id_f DESC LIMIT 5";
								foreach ($bdd->query($sql) as $row) {
									$listFiles = glob('./images/uploaded/'.$row['id_f'].'_1*');
									if(isset($listFiles[0]) && !empty($listFiles[0])){
										$lienImage=$listFiles[0];
									}
									else
										$lienImage='';
									//pour chaque réalisation : 
																		echo '<div class="col-md-3 resent-grid recommended-grid slider-first">
											<div class="resent-grid-img recommended-grid-img">
												<a href="index.php?p=viewsvideo&id_v='.$row['id_f'].'&type_v=1"><img src="'.$lienImage.'" alt="" width="250" height="250" /></a>
											</div>
											<div class="resent-grid-info recommended-grid-info">
												<h3><a href="index.php?p=viewsvideo&id_v='.$row['id_f'].'&type_v=1" class="title">'.$row['titre_f'].'</a></h3>
												<p>'.$row['desc_f'].'</p>
												<div class="slid-bottom-grids">
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
								';}
						?>
					</div>
						<div class="clearfix"> </div>
					</div>
					
						  <?php
						  if(isset($_SESSION['connecte'])){
							  ?>
				<div class="recommended">
					<div class="recommended-grids">
						<div class="recommended-info">
							<h3>Suggestion film :</h3>
						</div>
						<?php
								$requete = $bdd->query("SELECT * FROM film WHERE id_f NOT IN(SELECT id_f FROM visionner WHERE id_u = ".$_SESSION['id_u'].") LIMIT 5");
								while($reponse = $requete->fetch()){
									$listFiles = glob('./images/uploaded/'.$reponse['id_f'].'_1*');
									if(isset($listFiles[0]) && !empty($listFiles[0])){
										$lienImage=$listFiles[0];
									}
									else
										$lienImage='';
									//pour chaque réalisation : 
																		echo '<div class="col-md-3 resent-grid recommended-grid slider-first">
											<div class="resent-grid-img recommended-grid-img">
												<a href="index.php?p=viewsvideo&id_v='.$reponse['id_f'].'&type_v=1"><img src="'.$lienImage.'" alt="" width="250" height="250" /></a>
											</div>
											<div class="resent-grid-info recommended-grid-info">
												<h3><a href="index.php?p=viewsvideo&id_v='.$reponse['id_f'].'&type_v=1" class="title">'.$reponse['titre_f'].'</a></h3>
												<p>'.$reponse['desc_f'].'</p>
												<div class="slid-bottom-grids">
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
								';}
						?>
					</div>
						<div class="clearfix"> </div>
					</div>
						  <?php
						  }
						  ?>
				</div>
				</div>