<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 

    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Jotorres Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
</head>

<body>
    <div class="container align-items-center my-auto" style="padding-top: 2rem;">
        <div class="row artikl justify-content-md-center";>
            <div class="col-4"></div>
            <div class="col-4 align-items-center my-auto">
                <form method="post" action="">
                    <table border="1" >
                        <tr>
                            <td><label for="korisnickoIme">Korisnicko Ime</label></td>
                            <td><input type="text" name="korisnickoIme" id="korisnickoIme"></td>
                        </tr>
                        <tr>
                            <td><label for="lozinka">Lozinka</label></td>
                            <td><input name="lozinka" 

                              type="password" id="lozinka"></input></td>
                          </tr>
                          <tr>
                            <td><input type="submit" value="Submit"/></td>
                            <td><input type="reset" value="Reset"/></td>
                        </tr>
                    </table>
                </form>
                <?php
                if(isset($_POST["korisnickoIme"])){
                    $korisnickoIme = $_POST["korisnickoIme"];
                } else {
                    $korisnickoIme = "";
                }
                if(isset($_POST["lozinka"])){
                    $pass = $_POST["lozinka"];
                } else {
                    $pass = "";
                }

                include 'connect.php';

                $sql = "SELECT korisnickoIme, lozinka, razina FROM korisnik WHERE korisnickoIme = ?";
                 /* Inicijalizira statement objekt nad konekcijom */
                 $stmt=mysqli_stmt_init($dbc);
                 /* Povezuje parametre statement objekt s upitom */
                 if (mysqli_stmt_prepare($stmt, $sql)){
                     /* Povezuje parametre i njihove tipove s statement objektom */
                     mysqli_stmt_bind_param($stmt,'s',$korisnickoIme);
                     /* Izvršava pripremljeni upit */
                     mysqli_stmt_execute($stmt);
                 }
                /* Povezuje atribute iz rezultata s varijablama */
                 mysqli_stmt_bind_result($stmt, $a, $b, $c);
                 /* Dohvaća redak iz rezultata, i posprema vrijednosti atributa u varijable
                navedene funkcijom mysqli_stmt_bind_result() */
                 mysqli_stmt_fetch($stmt);
                 if (mysqli_stmt_num_rows($stmt)==0) echo ('Neuspjesan login');
                if($a==$korisnickoIme && password_verify($pass, $b) && $c=2){
                    header("Location: /RP/administracija.php");
                } else if($a==$korisnickoIme && password_verify($pass, $b) && $c=0) {
                    echo"<br><br>";
                    echo $korisnickoIme;
                    echo " Nemate , nemate dovoljna prava za pristup ovoj stranici.";
                    echo"<br><br>";
                }
                else{
                    echo"<br><br>";
                    echo"Niste registrirani";
                    echo"<br><br>";
                    echo "<a href='registracija.php'>Link za registraciju</a>";
                }
                ?>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</body>
</html>