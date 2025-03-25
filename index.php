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
    $servername = "localhost";
    $user = "root";
    $pass = "";
    $db = "php_projekt";
    $dbc = mysqli_connect($servername, $user, $pass, $db) or die("Error" . mysqli_connect_error());
    mysqli_set_charset($dbc, "utf8");
    if ($dbc) {
    }
    define('UPLPATH', 'images/');
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
                        <a href="nova_administracija.php">ADMINISTRACIJA</a>
                        <a href="registracija.php">REGISTRACIJA</a>
                    </div>
                </div>
            </div>
        </div>

    </nav>

    <section class="sport" >
        <div class="container">
            <div class="row" >
                <div class="col-lg-12 col-sm-12" id="second_section_title">
                    <h2>POLITIKA</h2>
                </div>
            </div>
        </div>
        <div class="container" id="sport_row">
            <div class="row">
               
                    <?php
                    $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='politika' LIMIT 3";
                    $result = mysqli_query($dbc, $query);
                    $i = 0;
                    while ($row = mysqli_fetch_array($result)) {
                       echo' <div class="col-lg-4 col-sm-12">';
                        echo '<article>';
                        echo '<div class="article">';
                        echo '<div class="sport_img">';
                        echo '<img src="' . UPLPATH . $row['slika'] . '"  style="width: 80%;">';
                        echo '</div>';
                        echo '<div class="media_body">';
                        echo '<h4 class="title">';
                        echo '<a href="Clanak.php?id=' . $row['id'] . '">';
                        echo $row['naslov'];
                        echo '</a></h4>';
                        echo '</div></div>';
                        echo '<div class="summary">';
                        echo $row['sazetak'];
                        echo '</div>';
                        echo '</article>';
                        echo ' </div>';
                    } ?>
               
            </div>
        </div>
    </section>


    <section class="sport" >
        <div class="container">
            <div class="row" >
                <div class="col-lg-12 col-sm-12" id="second_section_title">
                    <h2>SPORT</h2>
                </div>
            </div>
        </div>
        <div class="container" id="sport_row">
            <div class="row">
               
                    <?php
                    $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='sport' LIMIT 3";
                    $result = mysqli_query($dbc, $query);
                    $i = 0;
                    while ($row = mysqli_fetch_array($result)) {
                       echo' <div class="col-lg-4 col-sm-12">';
                        echo '<article>';
                        echo '<div class="article">';
                        echo '<div class="sport_img">';
                        echo '<img src="' . UPLPATH . $row['slika'] . '"  style="width: 80%;">';
                        echo '</div>';
                        echo '<div class="media_body">';
                        echo '<h4 class="title">';
                        echo '<a href="Clanak.php?id=' . $row['id'] . '">';
                        echo $row['naslov'];
                        echo '</a></h4>';
                        echo '</div></div>';
                        echo '<div class="summary">';
                        echo $row['sazetak'];
                        echo '</div>';
                        echo '</article>';
                        echo ' </div>';
                    } ?>
               
            </div>
        </div>
    </section>


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