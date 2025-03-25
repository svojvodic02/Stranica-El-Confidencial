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
                        <a href="nova_administracija.php">ADMINISTRACIJA</a>
                        <a href="unos.php">FORM</a>
                        <a href="registracija.php">REGISTRACIJA</a>
                    </div>
                </div>
            </div>
        </div>

    </nav>

    <div class="container">
        <div class="row" id="first_row">
                <form method="POST" action="" id="login">
                <div class="col-lg-12 col-sm-12" >
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                    </div>
                    <div class="col-lg-12 col-sm-12" >
                    <label for="lozinka">Password:</label>
                    <input type="password" id="lozinka" name="lozinka" required>
                    </div>
                    <div class="col-lg-12 col-sm-12" >
                    <button type="submit" name="prijava">Prijavi se</button>
                    </div>
                </form>
          
        </div>
    </div>

    <?php
    session_start();
    $servername = "localhost";
    $user = "root";
    $pass = "";
    $db = "php_projekt";
    $dbc = mysqli_connect($servername, $user, $pass, $db) or die("Error" . mysqli_connect_error());
    mysqli_set_charset($dbc, "utf8");

    define('UPLPATH', 'images/');
    $uspjesnaPrijava = false;

    if (isset($_POST['prijava'])) {
        $prijavaImeKorisnika = $_POST['username'];
        $prijavaLozinkaKorisnika = $_POST['lozinka'];
        $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
        mysqli_stmt_fetch($stmt);

        if (password_verify($_POST['lozinka'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) {
            $uspjesnaPrijava = true;
            if ($levelKorisnika == 1) {
                $_SESSION['username'] = $imeKorisnika;
                $_SESSION['level'] = $levelKorisnika;
                $admin = true;
                header('Location: administracija.php');

            } else {
                $admin = false;
                $_SESSION['username'] = $imeKorisnika;
                $_SESSION['level'] = $levelKorisnika;
                header('Location: nije_admin.php');

            }
            $_SESSION['username'] = $imeKorisnika;
            $_SESSION['level'] = $levelKorisnika;
        }
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
</body>

</html>