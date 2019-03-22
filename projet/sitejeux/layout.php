<html>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/style.css" />		
		<title><?= $title; ?></title>
	</head>
	<body>
	<div id="nav-header">
		<nav>
			<ul>
				<li><a href="index.php?p=accueil">Accueil</a></li>
				<li><a href="index.php?p=news">news</a></li>
				<li><a href="index.php?p=info">info</a>
					<ul>
						<li><a href="index.php?p=classe">Classe</a></li>
						<li><a href="index.php?p=sort">Sort</a></li>
						<li><a href="index.php?p=objet">Objet</a></li>
						<li><a href="index.php?p=bestiaire">Bestiaire</a></li>
						<li><a href="index.php?p=monde">Monde</a></li>
					</ul>
				</li>
				<li><a href="index.php?p=communaute">Communauté</a>
					<ul>
						<li><a href="./forum/index.php">Forum</a></li>
						<li><a href="index.php?p=gallerie">Gallerie</a></li>
					</ul>
				</li>
				<li><a href="index.php?p=contact">Contact</a>
					<ul>
						<li><a href="index.php?p=support">Support</a></li>
						<li><a href="index.php?p=faq">FAQ</a></li>
						<li><a href="index.php?p=quisommenous">Qui somme nous?</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
		
		
		<!-- contenu -->
		<?= $content; ?>
		
		<div id="footer">
		<footer>
			Copyright
		</footer>
		</div>
	</body>
</html>