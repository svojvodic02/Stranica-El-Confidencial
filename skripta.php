<?php
include 'Connect.php';
$picture = $_FILES['photo']['name'];
$title = $_POST['title1'];
$about = $_POST['about'];
$content = $_POST['content'];
$category = $_POST['category'];
$date = $_POST['datum'];
if (isset($_POST['archive'])) {
    $archive = 1;
} else {
    $archive = 0;
}
$target_dir = 'images/' . $picture;
move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir);
$query = "INSERT INTO Vijesti (datum, naslov, sazetak, tekst, slika, kategorija, 
arhiva ) VALUES ('$date', '$title', '$about', '$content', '$picture', 
'$category', '$archive')";
$result = mysqli_query($dbc, $query) or die('Error querying databese.');
mysqli_close($dbc);
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
    <header>

    <div class="container">
            <div class="row" id="first_row">
                <div class="col-lg-12 col-sm-12" id="navigation">
                    <div class="navigation_text">
                        <a href="index.php">HOME</a>
                        <a href="unos.html">FORM</a>
                        <a href="kategorija.php?id=sport " class="">SPORT</a>
                        <a href="kategorija.php?id=politika " class="">POLITIKA</a>
                        <a href="nova_administracija.php">ADMINISTRACIJA</a>
                        <a href="registracija.php">REGISTRACIJA</a>
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
    <?php
    $category = $_POST['category'];
    $title = $_POST['title1'];
    $image = $_FILES['photo']['name'];
    $about = $_POST['about'];
    $content = $_POST['content'];
    $date = $_POST['datum'];
    define('UPLPATH', 'images/');
    ?>

    <section role="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="category_php_words">
                        <p class="category_php"><?php
                        echo $category;
                        ?></p>
                    </div>
                    <hr>
                    <h1 class="title"><?php
                    echo $title;
                    ?></h1>
                    <p>AUTOR:</p>
                    <p>OBJAVLJENO:</p>
                    <?php
                    echo $date;
                    ?>
                </div>
                <section class="slika_skripte">
                    <?php
                    echo  '<img src="' . UPLPATH . $image . '"  style="width: 80%;">';
                    ?>
                </section>
                <section class="about">
                    <p>
                        <?php
                        echo $about;
                        ?>
                    </p>
                </section>
                <section class="sadrzaj">
                    <p>
                        <?php
                        echo $content;
                        ?>
                    </p>
                </section>
            </div>
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