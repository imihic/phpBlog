<!doctype html>
<html lang="en" class="h-100">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="generator" content="Jekyll v4.0.1">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- Custom styles for this template -->
	<link href="sticky-footer-navbar.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
	<header>
		<!-- Fixed navbar -->
		<nav class="navbar navbar-default navbar-expand-md fixed-top border-bottom border-dark">
			<a class="navbar-brand" href="#"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link tekst" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link tekst" href="#">Sport</a>
					</li>
					<li class="nav-item">
						<a class="nav-link tekst" href="#" tabindex="-1" aria-disabled="true">Politik</a>
					</li>
					<li class="nav-item">
						<a class="nav-link tekst" href="#" tabindex="-1" aria-disabled="true">Administracija</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>

	<!-- Begin page content -->
	<?php
	if (isset($_POST['title'])) {
 			$title=$_POST['title'];
	} else {
		$title = "Naslov nije unesen!!!!";
	}
	if (isset($_POST['about'])) {
 			$about=$_POST['about'];
	} else {
		$title = "About nije unesen!!!!";
	}
	if (isset($_POST['content'])) {
 			$content=$_POST['content'];
	} else {
		$title = "Sadržaj nije unesen!!!!";
	}
	if (isset($_POST['pphoto'])) {
 			$pphoto=$_POST['pphoto'];
	} else {
		$title = "Slika nije unesena!!!!";
	}
	if (isset($_POST['category'])) {
 			$category=$_POST['category'];
	} else {
		$title = "Kategorija nije unesena!!!!";
	}
	?>
	<main role="main">
		<div class="container">
			<section role="main">
				<div class="row">
					<p class="category"><?php
					echo $category;
					?></p>
					<h1 class="title"><?php
					echo $title;
					?></h1>
					<p>AUTOR:</p>
					<p>OBJAVLJENO:</p>
				</div>
				<section class="slika">
					<?php
					echo "<img src='img/$image'";
					?>
				</section>
				<section class="about">
					<p>
						<?php
						echo $about;
						?>
					</p>
				</section>
				<section class="sadrzaj">
					<p>
						<?php
						echo $content;
						?>
					</p>
				</section>
			</section>
		</main>

		<footer class="footer-copyright mt-auto text-center py-3" >
			<div class="container font-small">Ivan Mihić. ALL RIGHTS RESERVED. 2020
			</div>
		</footer>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script></body>
		</html>
