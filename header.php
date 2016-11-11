
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
	<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Napier Management Training</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Napier Management Training" />
	<meta name="keywords" content="Offering the best and most affordable management courses in Scotland since 2008" />
	<meta name="author" content="NMT" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Google Webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	<!-- Animate.css -->
	<link rel="stylesheet" href="/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="/css/icomoon.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/css/owl.theme.default.min.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="/css/magnific-popup.css">
	<!-- Theme Style -->
	<link rel="stylesheet" href="/css/style.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.2/cookieconsent.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.2/cookieconsent.min.js"></script>
	<script>
	window.addEventListener("load", function(){
	window.cookieconsent.initialise({
	  "palette": {
	    "popup": {
	      "background": "#000"
	    },
	    "button": {
	      "background": "#f1d600"
	    }
	  },
		 "showLink": false,
	  "content": {
	    "message": "This web site is for demonstration purposes only and is part of an academic coursework for Managing Software Projects at the School of Computing Edinburgh Napier University"
	  }
	})});
	</script>
	</head>
	<body>
	<header id="fh5co-header">
		<?php   if(isset($error)){
		    foreach($error as $error){
		      echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
		    }
		  } ?>

		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
				<!-- Mobile Toggle Menu Button -->
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#fh5co-navbar" aria-expanded="false"><em></em></a>
				<a class="navbar-brand" href="index.php">Napier Management Training</a>
				</div>
				<div id="fh5co-navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="index.php"><span>Home <span class="border"></span></span></a></li>
						<li><a href="courses.php"><span>Courses <span class="border"></span></span></a></li>
						<li><a href="about.php"><span>About Us <span class="border"></span></span></a></li>
						<li><a href="contact.php"><span>Contact <span class="border"></span></span></a></li>
						<?php if (isset($_SESSION['loggedin']) == true) {
							echo "<li><a href='#'><span>Your Details<span class='border'></span></span></a></li>
							<li><a href='logout.php'><span>Logout <span class='border'></span></span></a></li>";
						}
						else {
							echo "<li><a href='#' data-toggle='modal' data-target='#loginmodal'><span>Login <span class='border'></span></span></a></li>";
						}
						?>
						<!-- <li><a href="#" data-toggle="modal" data-target="#loginmodal"><span>Login <span class="border"></span></span></a></li> -->
					</ul>
				</div>
			</div>
		</nav>
	</header>
