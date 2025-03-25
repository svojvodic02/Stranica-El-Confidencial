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

    <?php
    session_start();
    $servername = "localhost";
    $user = "root";
    $pass = "";
    $db = "php_projekt";
    $dbc = mysqli_connect($servername, $user, $pass, $db) or die("Error" . mysqli_connect_error());
    mysqli_set_charset($dbc, "utf8");
    if ($dbc) {
    }
    define('UPLPATH', 'images/');
    if( $_SESSION['level'] == 0){
        echo '<div class="container" id="form_class">
            <div class="row">';
        echo "Niste admin!";
        echo '</div></div>';
    }else if( $_SESSION['level']==1){
        echo '<section class="form">
        <div class="container" id="form_class">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <form action="skripta.php" method="POST" enctype="multipart/form-data">
                        <div class="form-item">
                            <span id="porukaTitle" class="bojaPoruke"></span>
                            <label for="title1">Naslov vijesti</label>
                            <div class="form-field">
                                <input type="text" name="title1" class="form-field-textual" id="title1">
                            </div>
                        </div>


                        <div class="form-item">
                            <span id="porukaAbout" class="bojaPoruke"></span>
                            <label for="about">Kratki sadržaj vijesti (do 50
                                znakova)</label>
                            <div class="form-field">
                                <textarea name="about" id="about" cols="30" rows="10"
                                    class="formfield-textual"></textarea>
                            </div>
                        </div>


                        <div class="form-item">
                            <span id="porukaContent" class="bojaPoruke"></span>
                            <label for="content">Sadržaj vijesti</label>
                            <div class="form-field">
                                <textarea name="content" id="content" cols="30" rows="10"
                                    class="form-field-textual"></textarea>
                            </div>
                        </div>


                        <div class="form-item">
                            <span id="porukaPhoto" class="bojaPoruke"></span>
                            <label for="photo">Slika: </label>
                            <div class="form-field">
                                <input type="file" accept="image/*" class="input-text" name="photo" id="photo" />
                            </div>
                        </div>


                        <div class="form-item">
                            <span id="porukaCategory" class="bojaPoruke"></span>
                            <label for="category">Kategorija vijesti</label>
                            <div class="form-field">
                                <select name="category" id="category" class="form-field-textual">
                                    <option value="" disabled selected></option>
                                    <option value="sport">Sport</option>
                                    <option value="politika">Politika</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-item">
                            <span id="porukaDatum" class="bojaPoruke"></span>
                            <label>Datum vijesti:
                                <div class="form-field">
                                    <input type="date" name="datum" id="datum" max="<?php echo date("Y-m-d"); ?>">
                                </div>
                            </label>
                        </div>

                        <div class="form-item">
                            <label>Spremiti u arhivu:
                                <div class="form-field">
                                    <input type="checkbox" name="archive">
                                </div>
                            </label>
                        </div>
                        <div class="form-item">
                            <button type="reset" value="Poništi">Poništi</button>
                            <button type="submit" value="Prihvati" id="slanje">Prihvati</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>';
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

<script type="text/javascript">

    document.getElementById("slanje").onclick = function (event) {

        console.log("boze");
        var slanjeForme = true;

        var poljeTitle = document.getElementById("title1");
        var title = document.getElementById("title1").value;
        if (title.length < 5 || title.length > 30) {
            slanjeForme = false;
            poljeTitle.style.border = "1px dashed red";
            document.getElementById("porukaTitle").innerHTML = "<span style='color:red'>Naslov vjesti mora imati između 5 i 30 znakova!</span><br>";
        } else {
            poljeTitle.style.border = "1px solid green";
            document.getElementById("porukaTitle").innerHTML = "";
        }

   
        var poljeAbout = document.getElementById("about");
        var about = document.getElementById("about").value;
        if (about.length < 10 || about.length > 100) {
            slanjeForme = false;
            poljeAbout.style.border = "1px dashed red";
            document.getElementById("porukaAbout").innerHTML = "<span style='color:red'>Kratki sadržaj mora imati između 10 i 100 znakova!</span><br>";
        } else {
            poljeAbout.style.border = "1px solid green";
            document.getElementById("porukaAbout").innerHTML = "";
        }
   
        var poljeContent = document.getElementById("content");
        var content = document.getElementById("content").value;
        if (content.length == 0) {
            slanjeForme = false;
            poljeContent.style.border = "1px dashed red";
            document.getElementById("porukaContent").innerHTML = "<span style='color:red'>Sadržaj mora biti unesen!</span><br>";
        } else {
            poljeContent.style.border = "1px solid green";

            document.getElementById("porukaContent").innerHTML = "";
        }




        var poljeSlika = document.getElementById("photo");
        var pphoto = document.getElementById("photo").value;
        if (poljeSlika.value.length == 0) {
            slanjeForme = false;
            poljeSlika.style.border = "1px dashed red";
            document.getElementById("porukaPhoto").innerHTML = "<span style='color:red'>Slika mora biti unesena!</span><br>";
        } else {
            poljeSlika.style.border = "1px solid green";
            document.getElementById("porukaSlika").innerHTML = "";
        }
     
        var poljeDatum = document.getElementById("datum");
        var datum = document.getElementById("datum").value;
        if (datum.length == 0) {
            slanjeForme = false;
            poljeDatum.style.border = "1px dashed red";
            document.getElementById("porukaDatum").innerHTML = "<span style='color:red'>Datum mora biti odabran!</span><br>";
        } else {
            poljeSlika.style.border = "1px solid green";
            document.getElementById("porukaSlika").innerHTML = "";
        }
     
        var poljeCategory = document.getElementById("category");
        if (document.getElementById("category").selectedIndex == 0) {
            slanjeForme = false;
            poljeCategory.style.border = "1px dashed red";
            document.getElementById("porukaCategory").innerHTML = "<span style='color:red'>Kategorija mora biti odabrana!</span><br>";
        } else {
            poljeCategory.style.border = "1px solid green";
            document.getElementById("porukaCategory").innerHTML = "";
        }


        if (slanjeForme == false) {
            event.preventDefault();
        }

    };
</script>



</html>