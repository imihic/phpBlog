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
  <?php
  include 'connect.php';
  define('UPLPATH', '');
  ?>
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
  $id = strtolower($_GET['id']);
  ?>
  <main role="main">
    <div class="container">
      <div class="row articleTitle">
        <div class="col-12 align-items-center my-auto">
          <p><u><?php echo strtoupper($id) ?></u></p>
        </div>
      </div>
      <?php
      $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='". $id . "';";
      $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
       $i=0;
       while($row = mysqli_fetch_array($result)) {
         echo '<article>';
         echo '<div class="row artikl">';
         echo '<div class="col-4"><img class="img-fluid rounded" src="'.UPLPATH.$row['slika'].'"></div>';
         echo '<div class="col-8">';
         echo '<h4 class="title">';
         echo '<a href="clanak.php?id='.$row['id'].'">';
         echo $row['naslov'];
         echo '</a></h4>';
         echo '<p>'.$row['sazetak'].'</p>';
         echo '</div></div>';
         echo '</article>';
      }
      ?>
  </div>
</main>

<footer class="footer-copyright mt-auto text-center py-3" >
  <div class="container font-small">Ivan Mihić. ALL RIGHTS RESERVED. 2020
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script></body>
</html>