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
            <a class="nav-link tekst" href="administracija.php">Administracija</a>
          </li>
          <li class="nav-item">
            <a class="nav-link tekst" href="unos.php">Unos</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Begin page content -->
  <main role="main">
    <?php
    if(isset($_POST['delete'])){
     $id=$_POST['id'];
     $query = "DELETE FROM vijesti WHERE id=$id";
     $result = mysqli_query($dbc, $query);
    }
    if(isset($_POST['update'])){
      $picture = $_FILES['pphoto']['name'];
      $title=$_POST['title'];
      $about=$_POST['about'];
      $content=$_POST['content'];
      $category=$_POST['category'];
      if(isset($_POST['archive'])){
       $archive=1;
      }else{
       $archive=0;
      }
      $target_dir = 'img/'.$picture;
      move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
      $id=$_POST['id'];
      $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content',
      slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
      $result = mysqli_query($dbc, $query);
    }

    $query = "SELECT * FROM vijesti";
    $result = mysqli_query($dbc, $query);
    while($row = mysqli_fetch_array($result)) {
      echo '<div class="container">';
      echo '<form enctype="multipart/form-data" action="" method="POST">
      <div class="form-item">
      <label for="title">Naslov vjesti:</label>
      <div class="form-field">
      <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'">
      </div>
      </div>
      <div class="form-item">
      <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
       <div class="form-field">
       <textarea name="about" id="" cols="30" rows="10" class="formfield-textual">'.$row['sazetak'].'</textarea>
       </div>
       </div>
       <div class="form-item">
       <label for="content">Sadržaj vijesti:</label>
       <div class="form-field">
       <textarea name="content" id="" cols="30" rows="10" class="formfield-textual">'.$row['tekst'].'</textarea>
       </div>
       </div>
       <div class="form-item">
       <label for="pphoto">Slika:</label>
       <div class="form-field"><input type="file" class="input-text" id="pphoto"
       value="'.$row['slika'].'" name="pphoto"/> <br><img src="' . UPLPATH .
       $row['slika'] . '" width=100px>
// pokraj gumba za odabir slike pojavljuje se umanjeni prikaz postojeće slike
       </div>
       </div>
       <div class="form-item">
       <label for="category">Kategorija vijesti:</label>
       <div class="form-field">
       <select name="category" id="" class="form-field-textual"
       value="'.$row['kategorija'].'">
       <option value="politika">Politika</option>
       <option value="sport">Sport</option>
       </select>
       </div>
       </div>
       <div class="form-item">
       <label>Spremiti u arhivu:
       <div class="form-field">';
       if($row['arhiva'] == 0) {
         echo '<input type="checkbox" name="archive" id="archive"/>
         Arhiviraj?';
       } else {
         echo '<input type="checkbox" name="archive" id="archive"
         checked/> Arhiviraj?';
       }
       echo '</div>
       </label>
       <div class="form-item style:margin-top: 2rem; margin-bottom: 2rem;">
       <input type="hidden" name="id" class="form-field-textual"
       value="'.$row['id'].'">
       <button type="reset" value="Poništi">Poništi</button>
       <button type="submit" name="update" value="Prihvati">
       Izmjeni</button>
       <button type="submit" name="delete" value="Izbriši">
       Izbriši</button>
       </div>
       </div>
       </div>
       </form>';
       echo '</div>';
     } ?>
     </main>
     <footer class="footer-copyright mt-auto text-center py-3" >
     <div class="container font-small">Ivan Mihić. ALL RIGHTS RESERVED. 2020
     </div>
     </footer>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script></body>
     </html>