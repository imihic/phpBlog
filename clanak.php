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
            <a class="nav-link tekst" href="index.php">Početna</a>
          </li>
          <li class="nav-item">
            <a class="nav-link tekst" href="kategorija.php?id=Sport">Sport</a>
          </li>
          <li class="nav-item">
            <a class="nav-link tekst" href="kategorija.php?id=Politika">Politika</a>
          </li>
          <li class="nav-item">
            <a class="nav-link tekst" href="login.php">Administracija</a>
          </li>
          <li class="nav-item">
            <a class="nav-link tekst" href="unos.php">Unos</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>


<!-- Begin page content -->

<?php
  define('UPLPATH', '');
  include 'connect.php';
  $id = $_GET['id'];
  $query = "SELECT * FROM vijesti WHERE id=".$id."";
  $result = mysqli_query($dbc, $query);
  $row = $result -> fetch_array(MYSQLI_ASSOC);
?>
<main role="main">
  <div class="container">
    <div class="row articleTitle">
      <div class="col-12 align-items-center my-auto">
        <p><?php echo strtoupper($row["kategorija"]) ?></p>
      </div>
    </div>
    <article>
    <div class="row artikl justify-content-md-center">
      <h2><?php echo $row["naslov"]?></h2>
    </div>
    <div class="row artikl justify-content-md-center">
      <h7><?php echo $row["datum"] ?></h7>
      <?php echo'<div class="col-12"><img class="img-fluid rounded center" src="'.UPLPATH.$row['slika'].'">' ?>
    </div>
    <div class="row artikl">
        <div class="col-12">
          <p style="margin-left: 2rem; margin-right: 2rem; margin-top: 1rem;"><?php echo $row["tekst"] ?></p>
        </div>
    </div>
  </article>
  </div>
</main>

<footer class="footer-copyright mt-auto text-center py-3" >
  <div class="container font-small">Ivan Mihić imihic@tvz.hr. ALL RIGHTS RESERVED. 2020
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script></body>
</html>
