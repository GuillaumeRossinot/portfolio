
   <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="show-top-grids">
			<div class="col-sm-10 show-grid-left main-grids">							
					<div class="recommended">
						<div class="recommended-grids english-grid">
							<div class="recommended-info">
								<div class="heading">
									<h3> Resultats de la recherche pour les films : </h3>
								</div>
								<div class="clearfix"> </div>
							</div>

						<?php
									if(isset($_POST['submitSerch']) && isset($_POST['keyword']) && !empty($_POST['keyword'])){
										$titre=$_POST['keyword'];//"description";
										$sqlSearch = "SELECT id_f as id,'1' as type, titre_f as 'titre', desc_f as 'description' 
													FROM film f 
												WHERE UPPER(f.titre_f) LIKE UPPER('%$titre%') 
												   OR UPPER(f.desc_f) LIKE UPPER('%$titre%')";
										$found=0;
										foreach ($bdd->query($sqlSearch) as $search) {
											
												$listFiles = glob('./images/uploaded/'.$search['id'].'_'.$search['type'].'*');
												if(isset($listFiles[0]) && !empty($listFiles[0])){
													$lienImage=$listFiles[0];
												}
												else
													$lienImage='';
											
											$found++;
											/*echo '<tr><td>'.$search['type'].'</td> 
														<td> '.$search['titre'].'</td> 
														<td>'.$search['description'].'</td></tr>';*/
											echo '<div class="col-md-3 resent-grid recommended-grid slider-first">
											<div class="resent-grid-img recommended-grid-img">
												<a href="single.html"><img src="'.$lienImage.'" alt="" width="250" height="250" /></a>
											</div>
											<div class="resent-grid-info recommended-grid-info">
												<h3><a href="single.html" class="title">'.$search['titre'].'</a></h3>
												<p>'.$search['description'].'</p>
												<div class="slid-bottom-grids">
													<div class="slid-bottom-grid slid-bottom-right">
														<p class="views views-info">Note :</p>
													</div>
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>';
										}
										?>
										
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="recommended">
						<div class="recommended-grids english-grid">
							<div class="recommended-info">
								<div class="heading">
									<h3> Resultats de la recherche pour les séries : </h3>
								</div>
								<div class="clearfix"> </div>
							</div>

										<?php
										$sqlSearch = "SELECT id_se as id,'2' as type, titre_se as titre, desc_se as description
													FROM serie s 
												WHERE UPPER(s.titre_se) LIKE UPPER('%$titre%') 
												   OR UPPER(s.desc_se) LIKE UPPER('%$titre%')";
										foreach ($bdd->query($sqlSearch) as $search) {
											
												$listFiles = glob('./images/uploaded/'.$search['id'].'_'.$search['type'].'*');
												if(isset($listFiles[0]) && !empty($listFiles[0])){
													$lienImage=$listFiles[0];
												}
												else
													$lienImage='';
											
											$found++;
											/*echo '<tr><td>'.$search['type'].'</td> 
														<td> '.$search['titre'].'</td> 
														<td>'.$search['description'].'</td></tr>';*/
											echo '<div class="col-md-3 resent-grid recommended-grid slider-first">
											<div class="resent-grid-img recommended-grid-img">
												<a href="single.html"><img src="'.$lienImage.'" alt="" width="250" height="250" /></a>
											</div>
											<div class="resent-grid-info recommended-grid-info">
												<h3><a href="single.html" class="title">'.$search['titre'].'</a></h3>
												<p>'.$search['description'].'</p>
												<div class="slid-bottom-grids">
													<div class="slid-bottom-grid slid-bottom-right">
														<p class="views views-info">Note :</p>
													</div>
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>';
										}
										if($found == 0){
											echo "no results!";
										}
									}
									else{
										header( "Refresh:5; url=index.php", true, 303);
										echo "pas de mot clé";
									}
									
						?>
							<div class="clearfix"> </div>
						</div>
					</div>