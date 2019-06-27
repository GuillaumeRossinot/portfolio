<?php $title = "Accueil" ; ?>

<h2>Qui suis-je?</h2>
<p>
Je me nomme ROSSINOT Guillaume.</br>

Je suis actuellement en 2 ème année de BTS SIO (Services Informatiques aux Organisations) spécialité SLAM (Solutions logiciel et application métiers). 
</p>
<h2>Accueil</h2>
<section>
<h3>Projets Pédagogiques</h3>
<?php 


	$sql = "SELECT libelle,date_fin,description,url,chemin FROM projets P,images I WHERE P.id_p = i.id_p AND id_cat < 5 ORDER BY i.id_p";
	foreach ($bdd->query($sql) as $row) {
		//pour chaque réalisation : 
		echo '<a  class="Linkeda" href="'.$row['url'].'" target=_blank><img  class="LinkedImage" width="430" height="200" src="'.$row['chemin'].'" title="'.$row['libelle'].' - '.$row['description'].'" /></a>';
	}
?>
<!-- <nav aria-label="Search results pages">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav> -->
</section>
<section>
<h3>Projets Perso</h3>
<?php
	$sql = "SELECT libelle,date_fin,description,url,chemin FROM projets P,images I WHERE P.id_p = i.id_p AND id_cat = 5";
	foreach ($bdd->query($sql) as $row) {
		//pour chaque réalisation : 
		echo '<a class="Linkeda" href="'.$row['url'].'" target=_blank><img  class="LinkedImage" width="430" height="200" src="'.$row['chemin'].'" title="'.$row['libelle'].' - '.$row['description'].'" /></a>';
	}
?>
<!-- <nav aria-label="Search results page">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav> -->
</section>
<!-- liste competence -->
<section>
<h4>Competence</h4>
<table>
		<?php
					
					// lecture de la table projets
							$sql = "SELECT libelle,pourcentage FROM competences ";
							foreach ($bdd->query($sql) as $row) {
					//pour chaque réalisation : 
					echo '<article class="thumb">
							<tr><td>'.$row['libelle'].'</td><td><progress value="'.$row['pourcentage'].'" max="100"></progress></td></tr>
						</article>';
							}
					?>
	</table>
<!--	to do
<style>
#myProgress {
width: 100%;
background-color: #ddd;
}

#myBar {
width: 10%;
height: 30px;
background-color: #4CAF50;
text-align: center;
line-height: 30px;
color: white;
}
</style>

<div id="myProgress">
<div id="myBar">50%</div>
</div>

<script>

setTimeout(function(){
var elem = document.getElementById("myBar"); 
var width = 10;
var id = setInterval(frame, 10);
function frame() {
if (width >= 50) {
clearInterval(id);
} else {
width++; 
elem.style.width = width + '%'; 
elem.innerHTML = width * 1 + '%';
}
}
}, 1000)
</script> -->
</section>