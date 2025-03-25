
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
                        <a href="kategorija.php?id=sport">SPORT</a>
                        <a href="kategorija.php?id=politika">POLITIKA</a>
                        <a href="administracija.php">ADMINISTRACIJA</a>
                        <a href="unos.php">FORM</a>
                        <a href="registracija.php">REGISTRACIJA</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            <div class="row">
            <?php
            session_start();
            echo '<p>Bok ' .$_SESSION['username']  . '! Uspješno ste 
prijavljeni i administrator ste.</p>';
            $servername = "localhost";
            $user = "root";
            $pass = "";
            $db = "php_projekt";
            $dbc = mysqli_connect($servername, $user, $pass, $db) or die("Error" . mysqli_connect_error());
            mysqli_set_charset($dbc, "utf8");
            
            define('UPLPATH', 'images/');
                $query = "SELECT * FROM vijesti";
                $result = mysqli_query($dbc, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo' <div class="col-lg-4 col-sm-12">';
                    echo '<form enctype="multipart/form-data" action="" method="POST">
                                <div class="form-item">
                                    <label for="title">Naslov vjesti:</label>
                                    <div class="form-field">
                                        <input type="text" name="title" class="form-field-textual" value="' . $row['naslov'] . '">
                                    </div>
                                </div>
                                <div class="form-item">
                                    <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
                                    <div class="form-field">
                                        <textarea name="about" cols="30" rows="10" class="form-field-textual">' . $row['sazetak'] . '</textarea>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <label for="content">Sadržaj vijesti:</label>
                                    <div class="form-field">
                                        <textarea name="content" cols="30" rows="10" class="form-field-textual">' . $row['tekst'] . '</textarea>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <label for="photo">Slika:</label>
                                    <div class="form-field">
                                        <input type="file" class="input-text" id="photo" value="' . $row['slika'] . '" name="photo"/>
                                        <br><img src="' . UPLPATH . $row['slika'] . '" width=100px>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <label for="category">Kategorija vijesti:</label>
                                    <div class="form-field">
                                        <select name="category" class="form-field-textual" value="' . $row['kategorija'] . '">
                                            <option value="sport">Sport</option>
                                            <option value="kultura">Kultura</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <label>Spremiti u arhivu:
                                        <div class="form-field">';
                    if ($row['arhiva'] == 0) {
                        echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?';
                    } else {
                        echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';
                    }
                    echo '</div>
                                    </label>
                                </div>
                                <div class="form-item">
                                    <input type="hidden" name="id" class="form-field-textual" value="' . $row['id'] . '">
                                    <button type="reset" value="Poništi">Poništi</button>
                                    <button type="submit" name="update" value="update">Izmjeni</button>
                                    <button type="submit" name="delete" value="delete">Izbriši</button>
                                </div>
                            </form>';
                            echo '</div>';  
                }
            ?>
            </div>
        </div>
    </main>
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


<?php
if (isset($_POST['update'])) {
    $picture = $_FILES['photo']['name'];
    $title = $_POST['title'];
    $about = $_POST['about'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    if (isset($_POST['archive'])) {
        $archive = 1;
    } else {
        $archive = 0;
    }
    $target_dir = 'images/' . $picture;
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir);
    $id = $_POST['id'];
    $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content', 
        slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
    $result = mysqli_query($dbc, $query);
} else if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM vijesti WHERE id=$id ";
    $result = mysqli_query($dbc, $query);
}

?>