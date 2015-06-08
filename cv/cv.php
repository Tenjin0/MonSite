<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="./bower_components/bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet"/> -->
	<link href="./bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/custom.css">
	<link rel="stylesheet" type="text/css" href="./css/tuto.css">
	
	<title>
		Jquery Test
	</title>
</head>
<body>
	<nav id="mainbar" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
 		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	            </button>
	            <span class="navbar-brand">Patrice Petit</span>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav" >
					<li><a class="bar" href="blog.php">Blog</a></li>
					<li><a class="bar" href="#">CV</a></li>
					<li><a class="bar" href="#">Contact</a></li>
					<li class="dropdown"> 
			            <a class="bar "data-toggle="dropdown" href="#">Projets<b class="caret"></b></a>
			            <ul class="dropdown-menu">
							<hr class="separator">
							<li class="dropdown-header">PHP</li>
							<li><a href="#">Dompteurs</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Java/J2EE</li>
							<li><a href="#">Dompteurs</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">NodeJS</li>
							<li><a href="#">Dompteurs</a></li>
			            </ul>
			        </li>
				</ul>
			</div>
		</div>
		
	</nav>

	<div id="maincontainer" class="container-fluid">
		<div class="row">
			<section class="col-sm-12">Compétences</section>
		</div>
		<div class="row">
			<section class="col-sm-12">Formations</section>
		</div>
		<div class="row">
			<section class="col-sm-12">Expériences Professionelles</section>
		</div>
		<div class="row">
			<section class="col-sm-12">Centres d'intérêts</section>
		</div>
		<div class="row"></div>
		
	</div>
</body>
	<script src="./bower_components/jquery/dist/jquery.min.js"></script>
    <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"/> -->

</html>
