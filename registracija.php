<?php
$servername = "localhost";
$user = "root";
$pass = "";
$db = "php_projekt";
$dbc = mysqli_connect($servername, $user, $pass, $db) or die("Error" . mysqli_connect_error());
mysqli_set_charset($dbc, "utf8");
if ($dbc) {
}
define('UPLPATH', 'images/');
$ime = isset($_POST['ime']) ? $_POST['ime'] : '';
$prezime = isset($_POST['prezime']) ? $_POST['prezime'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$lozinka = isset($_POST['pass']) ? $_POST['pass'] : '';
$hashed_password = password_hash($lozinka, PASSWORD_BCRYPT);
$razina = 0;
$registriranKorisnik = false;
$msg = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $msg = 'Korisničko ime već postoji!';
        } else {
      
            $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
                mysqli_stmt_execute($stmt);
                $registriranKorisnik = true;
            }
        }
    }
    mysqli_close($dbc);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>

    <script src="https://kit.fontawesome.com/8211411ed2.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bellefair&family=Imbue:opsz,wght@10..100,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php
   
    if ($registriranKorisnik) {
        header('Location: index.php');
    } else {
       
        ?>


        <header>

            <div class="container">
                <div class="row" id="first_row">
                    <div class="col-lg-12 col-sm-12" id="title">
                        <div class="title_text">
                            <h1>El Confidencial</h1>
                            <p>EL DARIO DE LOS LECTORES INFLUYENTES</p>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <nav>

        <div class="container">
            <div class="row" id="first_row">
                <div class="col-lg-12 col-sm-12" id="navigation">
                    <div class="navigation_text">
                        <a href="index.php">HOME</a>
                        <a href="kategorija.php?id=sport " class="">SPORT</a>
                        <a href="kategorija.php?id=politika " class="">POLITIKA</a>
                        <a href="administracija.php">ADMINISTRACIJA</a>
                        <a href="registracija.php">REGISTRACIJA</a>
                    </div>
                </div>
            </div>
        </div>

        </nav>

        <?php include 'Connect.php' ?>




        <?php

        if ($registriranKorisnik == true) {
            header('Location: index.php');
        } else {
            ?>

            <section role="main">
                <div class="container">
                    <div class="row">
                        <form enctype="multipart/form-data" action="" method="POST">
                            <div class="form-item">
                                <span id="porukaIme" class="bojaPoruke"></span>
                                <label for="title">Ime: </label>
                                <div class="form-field">
                                    <input type="text" name="ime" id="ime" class="form-field-textual">
                                </div>
                            </div>
                            <div class="form-item">
                                <span id="porukaPrezime" class="bojaPoruke"></span>
                                <label for="about">Prezime: </label>
                                <div class="form-field">
                                    <input type="text" name="prezime" id="prezime" class="form-field-textual">
                                </div>
                            </div>
                            <div class="form-item">
                                <span id="porukaUsername" class="bojaPoruke"></span>

                                <label for="content">Korisničko ime:</label>
                                <?php echo '<br><span class="bojaPoruke">' . $msg . '</span>'; ?>
                                <div class="form-field">
                                    <input type="text" name="username" id="username" class="form-field-textual">
                                </div>
                            </div>
                            <div class="form-item">
                                <span id="porukaPass" class="bojaPoruke"></span>
                                <label for="pphoto">Lozinka: </label>
                                <div class="form-field">
                                    <input type="password" name="pass" id="pass" class="form-field-textual">
                                </div>
                            </div>
                            <div class="form-item">
                                <span id="porukaPassRep" class="bojaPoruke"></span>
                                <label for="pphoto">Ponovite lozinku: </label>
                                <div class="form-field">
                                    <input type="password" name="passRep" id="passRep" class="form-field-textual">
                                </div>
                            </div>

                            <div class="form-item">
                                <button type="submit" value="Prijava" id="slanje">Prijava</button>
                                <span id="porukaregistracije" class="bojaPoruke"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <script type="text/javascript">
                document.getElementById("slanje").onclick = function (event) {

                    var slanjeForme = true;

                    // Ime korisnika mora biti uneseno
                    var poljeIme = document.getElementById("ime");
                    var ime = document.getElementById("ime").value;
                    if (ime.length == 0) {
                        slanjeForme = false;
                        poljeIme.style.border = "1px dashed red";
                        document.getElementById("porukaIme").innerHTML = "<br>Unesite ime! <br> ";
                    } else {
                        poljeIme.style.border = "1px solid green";
                        document.getElementById("porukaIme").innerHTML = "";
                    }
                    // Prezime korisnika mora biti uneseno
                    var poljePrezime = document.getElementById("prezime");
                    var prezime = document.getElementById("prezime").value;
                    if (prezime.length == 0) {
                        slanjeForme = false;
                        13
                        poljePrezime.style.border = "1px dashed red";

                        document.getElementById("porukaPrezime").innerHTML = "<br>Unesite Prezime!<br>";
                    } else {
                        poljePrezime.style.border = "1px solid green";
                        document.getElementById("porukaPrezime").innerHTML = "";
                    }

                    // Korisničko ime mora biti uneseno
                    var poljeUsername = document.getElementById("username");
                    var username = document.getElementById("username").value;
                    if (username.length == 0) {
                        slanjeForme = false;
                        poljeUsername.style.border = "1px dashed red";

                        document.getElementById("porukaUsername").innerHTML = "<br>Unesite korisničko ime! <br> ";
                    } else {
                        poljeUsername.style.border = "1px solid green";
                        document.getElementById("porukaUsername").innerHTML = "";
                    }

                    // Provjera podudaranja lozinki
                    var poljePass = document.getElementById("pass");
                    var pass = document.getElementById("pass").value;
                    var poljePassRep = document.getElementById("passRep");
                    var passRep = document.getElementById("passRep").value;
                    if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
                        slanjeForme = false;
                        poljePass.style.border = "1px dashed red";
                        poljePassRep.style.border = "1px dashed red";
                        document.getElementById("porukaPass").innerHTML = "<br>Lozinke  nisu iste! <br> ";

                        document.getElementById("porukaPassRep").innerHTML = "<br>Lozinke nisu iste!<br>";
                    } else {
                        poljePass.style.border = "1px solid green";
                        poljePassRep.style.border = "1px solid green";
                        document.getElementById("porukaPass").innerHTML = "";
                        document.getElementById("porukaPassRep").innerHTML = "";
                    }

                    if (slanjeForme != true) {
                        event.preventDefault();
                    }else if(slanjeForme ==true){
                        document.getElementById("porukaregistracije").innerHTML = "<br>Korisnik je uspješno registriran! <br>";
                    }
                    14

                };

            </script>
            <?php
        }
        ?>


        <footer>
            <div class="container" id="footer_text">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                    <p>Sara Vojvodić, svojvodic@tvz.hr 2024.</p>
                    </div>
                </div>
            </div>
        </footer>
        <?php
    }
    ?>

</body>

</html>