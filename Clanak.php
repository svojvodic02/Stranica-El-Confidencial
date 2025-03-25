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
                <div class="col-lg-12 col-sm-12" id="title_gore">
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
    <?php
    $id = $_GET['id'];
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

    <?php
    $sql = "SELECT * FROM vijesti WHERE id = '" . $id . "'";
    $result = mysqli_query($dbc, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
    } else {
        echo "no records found with this id";
    }
    ?>

    <section role="main">
        <div class="container">
            <div class="row">
                <div class="row">
                    <h2 style="text-transform:uppercase;" class="category"><?php
                    echo "<span>" . $row["kategorija"] . "</span>";
                    ?></h2>
                    <h1  class="title"><?php
                    echo $row['naslov'];
                    ?></h1>
                   <section class="about">
                    <p>
                        <?php
                        echo "<i>" . $row['sazetak'] . "</i>";
                        ?>
                    </p>
                </section>
                </div>
                <section class="slika">
                    <?php
                    echo '<img src="' . UPLPATH . $row['slika'] . '"  style="width: 80%;">';
                    ?>
                </section>
                <p>OBJAVLJENO: <?php

echo "<span>" . $row['datum'] . "</span>";
?></p>
                
                <section class="sadrzaj">
                    <p>
                        <?php
                        echo $row['tekst'];
                        ?>
                    </p>
                </section>
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