        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="show-top-grids">
				<div class="col-sm-10 show-grid-left main-grids">
					<div class="recommended">
						<div class="recommended-grids english-grid">
							<div class="recommended-info">
								<div class="heading">
									<h3>Action/Aventure</h3>
								</div>
								<div class="clearfix"> </div>
							</div>

						<?php
								$sql = "SELECT id_f,titre_f,desc_f ,lien_f FROM film WHERE genre_f = 1 ORDER BY id_f LIMIT 5";
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
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="recommended">
						<div class="recommended-grids">
							<div class="recommended-info">
								<div class="heading">
									<h3>Dramatique</h3>
								</div>
								<div class="clearfix"> </div>
							</div>
							<?php
								$sql = "SELECT id_f,titre_f,desc_f ,lien_f FROM film WHERE genre_f = 2 ORDER BY id_f LIMIT 5";
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
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="recommended">
						<div class="recommended-grids">
							<div class="recommended-info">
								<div class="heading">
									<h3>Fantastique et science-fiction</h3>
								</div>
								<div class="clearfix"> </div>
							</div>
							<?php
							$sql = "SELECT id_f,titre_f,desc_f ,lien_f FROM film WHERE genre_f = 3 ORDER BY id_f LIMIT 5";
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
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="recommended">
						<div class="recommended-grids">
							<div class="recommended-info">
								<div class="heading">
									<h3>Historique</h3>
								</div>
								<div class="clearfix"> </div>
							</div>
						<?php
								$sql = "SELECT id_f,titre_f,desc_f ,lien_f FROM film WHERE genre_f = 4 ORDER BY id_f LIMIT 5";
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
							<div class="clearfix"> </div>
					</div>
				</div>
					<div class="recommended">
						<div class="recommended-grids">
							<div class="recommended-info">
								<div class="heading">
									<h3>Animation</h3>
								</div>
								<div class="clearfix"> </div>
							</div>
						<?php
								$sql = "SELECT id_f,titre_f,desc_f ,lien_f FROM film WHERE genre_f = 5 ORDER BY id_f LIMIT 5";
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
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="recommended">
						<div class="recommended-grids">
							<div class="recommended-info">
								<div class="heading">
									<h3>Comédie</h3>
								</div>
								<div class="clearfix"> </div>
							</div>
						<?php
								$sql = "SELECT id_f,titre_f,desc_f ,lien_f FROM film WHERE genre_f = 6 ORDER BY id_f LIMIT 5";
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
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="recommended">
						<div class="recommended-grids">
							<div class="recommended-info">
								<div class="heading">
									<h3>Policières et thrillers</h3>
								</div>
								<div class="clearfix"> </div>
							</div>
						<?php
								$sql = "SELECT id_f,titre_f,desc_f ,lien_f FROM film WHERE genre_f = 7 ORDER BY id_f LIMIT 5";
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
							<div class="clearfix"> </div>
						</div>
					</div>					