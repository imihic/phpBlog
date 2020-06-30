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
 <main role="main">
   <div class="container">
     <div class="row justify-content-md-center">
       <div class="col-8">
        <form enctype="multipart/form-data" action=""
        method="POST">
        <div class="form-item">
         <span id="porukaTitle" class="bojaPoruke"></span>
         <label for="title">Naslov vjesti</label>
         <div class="form-field">
           <input type="text" name="title" id="title" class="formfield-textual">
         </div>
       </div>
       <div class="form-item">
         <span id="porukaAbout" class="bojaPoruke"></span>
         <label for="about">Kratki sadržaj vjesti (do 50
         znakova)</label>
         <div class="form-field">
           <textarea name="about" id="about" cols="30" rows="10"
           class="form-field-textual"></textarea>
         </div>
       </div>
       <div class="form-item">
         <span id="porukaContent" class="bojaPoruke"></span>
         <label for="content">Sadržaj vjesti</label>
         <div class="form-field">
           <textarea name="content" id="content" cols="30" rows="10"
           class="form-field-textual"></textarea>
         </div>
       </div>
       <div class="form-item">
         <span id="porukaSlika" class="bojaPoruke"></span>
         <label for="pphoto">Slika: </label>
         <div class="form-field">
           <input type="file" class="input-text" id="pphoto"
           name="pphoto"/>
         </div>
       </div>
       <div class="form-item">
         <span id="porukaKategorija" class="bojaPoruke"></span>
         <label for="category">Kategorija vjesti</label>
         <div class="form-field">
           <select name="category" id="category" class="form-fieldtextual">
             <option value="" disabled selected>Odabir
             kategorije</option>
             <option value="sport">Sport</option>
             <option value="politika">Politika</option>
           </select>
         </div>
       </div>
       <div class="form-item">
         <label>Spremiti u arhivu:
           <div class="form-field">
             <input type="checkbox" name="archive" id="archive">
           </div>
         </label>
       </div>
       <div class="form-item">
         <button type="reset" value="Poništi">Poništi</button>
         <button type="submit" value="Prihvati"
         id="slanje">Prihvati</button>
       </div>
     </form>
   </div>
 </div>
</div>
</main>
<?php
include 'connect.php';
$date = date('d.m.Y.');
if (isset($_POST['title'])){
  $title = $_POST['title'];
} else {
  $title = '';
}
if (isset($_POST['about'])){
  $about = $_POST['about'];
} else {
  $about = '';
}
if (isset($_POST['content'])){
  $content = $_POST['content'];
} else {
  $content = '';
}
if (isset($_POST['category'])){
  $category = $_POST['category'];
} else {
  $category = '';
}
if(isset($_FILES['pphoto']['name'])){
  $picture = $_FILES['pphoto']['name']; 
  $target_dir = 'img/'.$picture; 
  move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
} else {
  $target_dir = '';
}
if(isset($_POST['archive'])){
  $archive=1;
}else{
  $archive=0;
}
if($title != "" && $about != "" && $content != "" && $category != "" && $target_dir != ""){
$query = "INSERT INTO vijesti(datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES(CURDATE(), '$title', '$about', '$content', '$target_dir', '$category', '$archive')";
$result = mysqli_query($dbc, $query) or die('Error querying databese.');
mysqli_close($dbc);
}
?>
<footer class="footer-copyright mt-auto text-center py-3" >
  <div class="container font-small">Ivan Mihić. ALL RIGHTS RESERVED. 2020
  </div>
</footer>
<script type="text/javascript">
 // Provjera forme prije slanja
  document.getElementById("slanje").onclick = function(event) {
  var slanjeForme = true;
 // Naslov vjesti (5-30 znakova)
  var poljeTitle = document.getElementById("title");
  var title = document.getElementById("title").value;
 if (title.length < 5 || title.length > 30) {
   slanjeForme = false;
   poljeTitle.style.border="1px dashed red";
   document.getElementById("porukaTitle").innerHTML="Naslov vjesti mora imati između 5 i 30 znakova!<br>";
 } else {
   poljeTitle.style.border="1px solid green";
   document.getElementById("porukaTitle").innerHTML="";
 }

 // Kratki sadržaj (10-100 znakova)
 var poljeAbout = document.getElementById("about");
 var about = document.getElementById("about").value;
 if (about.length < 10 || about.length > 100) {
   slanjeForme = false;
   poljeAbout.style.border="1px dashed red";
   document.getElementById("porukaAbout").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
 } else {
   poljeAbout.style.border="1px solid green";
   document.getElementById("porukaAbout").innerHTML="";
 }
 // Sadržaj mora biti unesen
 var poljeContent = document.getElementById("content");
 var content = document.getElementById("content").value;
 if (content.length == 0) {
   slanjeForme = false;
   poljeContent.style.border="1px dashed red";
   document.getElementById("porukaContent").innerHTML="Sadržaj mora biti unesen!<br>";
 } else {
   poljeContent.style.border="1px solid green"; document.getElementById("porukaContent").innerHTML="";
 }
 // Slika mora biti unesena
 var poljeSlika = document.getElementById("pphoto");
 var pphoto = document.getElementById("pphoto").value;
 if (pphoto.length == 0) {
   slanjeForme = false;
   poljeSlika.style.border="1px dashed red";
   document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";
 } else {
   poljeSlika.style.border="1px solid green";
   document.getElementById("porukaSlika").innerHTML="";
 }
 // Kategorija mora biti odabrana
 var poljeCategory = document.getElementById("category");
 if(document.getElementById("category").selectedIndex == 0) {
   slanjeForme = false;
   poljeCategory.style.border="1px dashed red";

   document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
 } else {
   poljeCategory.style.border="1px solid green";
   document.getElementById("porukaKategorija").innerHTML="";
 }
 if (slanjeForme != true) {
   event.preventDefault();
 }
};
</script>
</body>
</html>