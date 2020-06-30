<!DOCTYPE html>

<html>

<head>

    <script type="text/javascript" src="jquery-1.11.0.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <script src="js/form-validation.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>

        form .error {
            color: #ff0000;
        }
        .forma {
            width: 30%;
            margin: auto;
            margin-top: 5rem;
        }

    </style>

</head>

<body>
    <div class = "container">

    <form method="POST" class="forma" action="" name="prijava">

        <label for="username">Korisničko ime</label>

        <input type="text" name="username" id="username" />

        <br>

        <label for="ime">Ime</label>

        <input type="text" name="ime" id="ime" />

        <br>

        <label for="prezime">Prezime</label>

        <input type="text" name="prezime" id="prezime" />

        <br>

        <label for="password">Lozinka</label>

        <input type="password" name="password" id="password" />

        <br>

        <label for="passwordCheck">Ponovi lozinku</label>

        <input type="password" name="passwordCheck" id="passwordCheck" />

        <br>
        <button type="submit">Registriraj se</button>
    </form>
</div>
    <script>

        $(function() {

            $("form[name='prijava']").validate({

                rules: {

                    username: {

                        required: true,

                        minlength: 6,

                        maxlength: 15

                    },

                    ime: {
                        required: true
                    },

                    prezime: {
                        required: true
                    },

                    password: {

                        required: true,

                    },

                    passwordCheck: {

                        required: true,

                        equalTo: "#password"

                    }

                },

                messages: {

                    username: {

                        required: "Korisničko ime ne smije biti prazno",

                        minlength: "Korisničko ime ne smije biti manje od 6 znakova",

                        maxlength: "Korisničko ime ne smije biti veće od 15 znakova"

                    },

                    ime: {
                        required: "Ime ne smije biti prazno"
                    },

                    prezime: {
                        required: "Prezime ne smije biti prazno"
                    },

                    password: {

                        required: "Lozinka ne smije biti prazna"

                    },

                    passwordCheck: {

                        required: "Potrebno je ponoviti lozinku",

                        equalTo: "Lozinke trebaju biti iste"

                    },

                    submitHandler: function(form) {

                        form.submit();

                    }

                }

            })

        });

    </script>
    <?php
        if(isset($_POST["username"])){
            $korisnickoIme = $_POST["username"];
        } else {
            $korisnickoIme = "";
        }
        if(isset($_POST["password"])){
            $lozinka = $_POST["password"];
        } else {
            $lozinka = "";
        }
        if(isset($_POST["ime"])){
            $ime = $_POST["ime"];
        } else {
            $ime = "";
        }
        if(isset($_POST["prezime"])){
            $prezime = $_POST["prezime"];
        } else {
            $prezime = "";
        }
        $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
        $razina = 0;
        $registriranKorisnik = '';
        include 'connect.php';
        //Provjera postoji li u bazi već korisnik s tim korisničkim imenom
        $sql = "SELECT korisnickoIme FROM korisnik WHERE korisnickoIme = ?";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
         mysqli_stmt_bind_param($stmt, 's', $korisnickoIme);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         }
        if(mysqli_stmt_num_rows($stmt) > 0){
         echo'Korisničko ime već postoji!';
        }else{
        $sql="INSERT INTO korisnik(ime, prezime, korisnickoIme, lozinka, razina) VALUES(?, ?, ?, ?, ?)";
         /* Inicijalizira statement objekt nad konekcijom */
         $stmt=mysqli_stmt_init($dbc);
         /* Povezuje parametre statement objekt s upitom */
         if (mysqli_stmt_prepare($stmt, $sql)){
         /* Povezuje parametre i njihove tipove s statement objektom */
         mysqli_stmt_bind_param($stmt,'ssssi', $ime, $prezime, $korisnickoIme, $hashed_password, $razina);
         /* Izvršava pripremljeni upit */
         mysqli_stmt_execute($stmt);
         $registriraniKorisnik = true;
        }
     }
        mysqli_close($dbc);
    ?>
</body>
</html>