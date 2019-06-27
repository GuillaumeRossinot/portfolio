<!DOCTYPE HTML>
<html>
<head>
<title>Site streaming</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="My Play Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<link href="css/dashboard.css" rel="stylesheet">
<!-- theme css -->
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
<script src="js/jquery-1.11.1.min.js"></script>
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>

</head>
  <body>
  
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><h1><img src="images/logo.png" alt="" /></h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<div class="top-search">
				<form class="navbar-form navbar-right" action="index.php?p=search" method="post">
				
					<input type="text" name="keyword" class="form-control" placeholder="Search...">
					<input name="submitSerch" type="submit" value=" ">
				</form>
			</div>		
				<?php if(isset ($_SESSION ['connecte']))
				{
				?>	
				<div class="header-top-right">
				<div class="account">
					<a href="index.php?p=moncompte">Mon Compte</a>
				</div>
				<?php
					if(isset($_SESSION['lvl']) && $_SESSION['lvl'] == 3){
						?>				
				<div class="file">
					<a href="index.php?p=admin">Administration</a>
				</div>
				<?php
					}
				?>
				<div class="file">
					<a href="index.php?p=upload">Upload</a>
				</div>					
				<div class="signin">
					<a href="index.php?p=logout">Logout</a>
				</div>
				<?php
				}
				else
				{
				?>
				<div class="signin">
					<a href="index.php?p=login">Login</a>
				</div>
				<div class="signin">
					<a href="index.php?p=register">Inscription</a>
				</div>
				<?php
				}
				?>				

			</div>
		</div>
				<div class="clearfix"> </div>
			</div>
        </div>
		<div class="clearfix"> </div>
      </div>
    </nav>
	
        <div class="col-sm-3 col-md-2 sidebar">
			<div class="top-navigation">
				<div class="t-menu">MENU</div>
				<div class="t-img">
					<img src="images/lines.png" alt="" />
				</div>
				<div class="clearfix"> </div>
			</div>
				<div class="drop-navigation drop-navigation">
				  <ul class="nav nav-sidebar">
					<li class="active"><a href="index.php" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
					<li><a href="index.php?p=shows" class="menu1"><span class="glyphicon glyphicon-film" aria-hidden="true"></span>Séries</a></li>
					<li><a href="index.php?p=movies" class="menu1"><span class="glyphicon glyphicon-film" aria-hidden="true"></span>Films</span></a></li>
						<!-- script-for-menu -->
						<script>
							$( "li a.menu1" ).click(function() {
							$( "ul.cl-effect-2" ).slideToggle( 300, function() {
							});
							});
						</script> 
						</ul>
						<!-- script-for-menu -->
						<script>
							$( "li a.menu" ).click(function() {
							$( "ul.cl-effect-1" ).slideToggle( 300, function() {
							});
							});
						</script>
				  </ul>
				  <!-- script-for-menu -->
						<script>
							$( ".top-navigation" ).click(function() {
							$( ".drop-navigation" ).slideToggle( 300, function() {
							});
							});
						</script>
					<div class="side-bottom">
						<div class="side-bottom-icons">
							<ul class="nav2">
								<li><a href="#" class="facebook"> </a></li>
								<li><a href="#" class="facebook twitter"> </a></li>
							</ul>
						</div>
						<div class="copyright">
							<p>Copyright</p>
						</div>
					</div>
				</div>
        </div>
  
  <?= $content; ?>
  
  			<!-- footer -->
			<div class="footer">
				<div class="footer-grids">
					<div class="footer-top">
						<div class="footer-top-nav">
							<ul>
							
							</ul>
						</div>
						<div class="footer-bottom-nav">
							<ul>
							
							</ul>
						</div>
					</div>
					<div class="footer-bottom">

							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>