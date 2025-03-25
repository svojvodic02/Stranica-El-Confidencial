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
                        <a href="registracija.php">REGISTRACIJA</a>
                    </div>
                </div>
            </div>
        </div>

    </nav>

    <section class="sport">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12" id="second_section_title">
                    <h2 style="text-transform:uppercase;"><?php echo htmlspecialchars($_GET['id']); ?></h2>
                </div>
            </div>
        </div>
        <div class="container" id="sport_row">
            <div class="row">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "php_projekt";

              
                $conn = new mysqli($servername, $username, $password, $dbname);

              
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $stmt = $conn->prepare("SELECT * FROM vijesti WHERE kategorija = ?");
                $stmt->bind_param("s", $_GET['id']);
                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-4 col-sm-12">';
                    echo '<article>';
                    echo '<div class="article">';
                    echo '<div class="sport_img">';
                    echo '<img src="images/' . $row['slika'] . '"  style="width: 80%;">';
                    echo '</div>';
                    echo '<div class="media_body">';
                    echo '<h4 class="title">';
                    echo '<a href="Clanak.php?id=' . $row['id'] . '">';
                    echo htmlspecialchars($row['naslov']);
                    echo '</a></h4>';
                    echo '</div></div>';
                    echo '<div class="summary">';
                    echo $row['sazetak'];
                    echo '</div>';
                    echo '</article>';
                    echo '</div>';
                }

                $stmt->close();
                $conn->close();
                ?>
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
