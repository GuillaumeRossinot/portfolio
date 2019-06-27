
<html>
		<meta charset="ISO" />
		<link rel="stylesheet" href="css/style.css" />
	<head>
		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<script type="text/javascript" src="/js/zoombox.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="css/zoombox.css" rel="stylesheet" type="text/css" media="screen" />

			<script type="text/javascript">
		jQuery(function($){
			//$('a.zoombox').zoombox();

			$('a.zoombox,.Linkeda a').zoombox({
				theme       : 'zoombox',        //available themes : zoombox,lightbox, prettyphoto, darkprettyphoto, simple
				opacity     : 0.8,              // Black overlay opacity
				duration    : 800,              // Animation duration
				animation   : true,             // Do we have to animate the box ?
				width       : 600,              // Default width
				height      : 400,              // Default height
				gallery     : true,             // Allow gallery thumb view
				autoplay : false                // Autoplay for video
			});
		});
	</script>
		<title><?= $title; ?></title>
	</head>
	<body>
	<!-- menu navigation -->
	<div id="nav-header">
		<nav>
			<ul>
				<li><a href="accueil">Accueil</a></li>
				<li><a href="projetcour">Projet cour</a></li>
				<li><a href="projetpersonnel">Projet personnel</a></li>
				<li><a href="contact">Contact</a></li>
			</ul>
		</nav>
	</div>
		
		<!-- contenu -->
		<div id="content">
		<?= $content; ?>
		</div>
		
	<!-- footer -->	
	<div id="footer">		
		<footer>
			Copyright
		</footer>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>