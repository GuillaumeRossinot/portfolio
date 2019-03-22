
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Flux RSS</title>

	<link rel="shortcut icon" href="./views/Images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="./views/css/bootstrap.min.css">
	<link rel="stylesheet" href="./views/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="./views/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="./views/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="views/js/html5shiv.js"></script>
	<script src="views/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.html"><img src="./views/Images/logo.png" alt="Progressus HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="#">Accueil</a></li>
					<li><a href="?p=about">A propos</a></li>
					<li><a href="?p=test">test</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Plus de Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-left.html">Page 1</a></li>
							<li class="active"><a href="sidebar-right.html">Page 2</a></li>
						</ul>
					</li>
					<li><a href="contact.html">Contact</a></li>
					<li><a class="btn" href="signin.html">Connexion / Déconnexion</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">Flux RSS</h1>
			</div>
		</div>
	</header>
	<!-- /Header -->

  <body>
   <!--ne pas modifier cette partie-->
	<?= $content ?>
  </body>

	<footer id="footer" class="top-space">

<div class="footer1">
	<div class="container">
		<div class="row">
			
			<div class="col-md-3 widget">
				<h3 class="widget-title">Contact</h3>
				<div class="widget-body">
					<p>0649812285<br>
						<a href="mailto:#">arslanebounabi@hotmail.fr</a><br>
						<br>
						Ecole ITIC Paris
					</p>	
				</div>
			</div>

			<div class="col-md-3 widget">
				<h3 class="widget-title">Pour me Follow</h3>
				<div class="widget-body">
					<p class="follow-me-icons">
						<a href=""><i class="fa fa-twitter fa-2"></i></a>
						<a href=""><i class="fa fa-dribbble fa-2"></i></a>
						<a href=""><i class="fa fa-github fa-2"></i></a>
						<a href=""><i class="fa fa-facebook fa-2"></i></a>
					</p>	
				</div>
			</div>

			<div class="col-md-6 widget">
				<h3 class="widget-title">Des questions ?</h3>
				<div class="widget-body">
					<p>Si jamais vous avez des questions  ou des conseils pour l'amélioration du site je suis preneur.</p>
				</div>
			</div>

		</div> <!-- /row of widgets -->
	</div>
</div>

<div class="footer2">
	<div class="container">
		<div class="row">
			
			<div class="col-md-6 widget">
				<div class="widget-body">
					<p class="simplenav">
						<a href="#">Accueil</a> |
						<a href="about.html">A propos</a> |
						<a href="sidebar-right.html">Page</a> |
						<a href="contact.html">Contact</a> |
						<b><a href="signup.html">S'inscrire</a></b>
					</p>
				</div>
			</div>

			<div class="col-md-6 widget">
				<div class="widget-body">
					<p class="text-right">
						Copyright &copy; 2019, Arslane Bounabi.</p>
				</div>
			</div>

		</div> <!-- /row of widgets -->
	</div>
</div>

</footer>	





<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="views/js/headroom.min.js"></script>
<script src="views/js/jQuery.headroom.min.js"></script>
<script src="views/js/template.js"></script>
</body>
</html>