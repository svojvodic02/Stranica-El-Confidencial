<?php
include 'Connect.php';
$picture = $_FILES['photo']['name'];
$title=$_POST['title'];
$about=$_POST['about'];
$content=$_POST['content'];
$category=$_POST['category'];
$date=$_POST['datum'];
if(isset($_POST['archive'])){
 $archive=1;
}else{
 $archive=0;
}
$target_dir = 'images/'.$picture;
move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir);
$query = "INSERT INTO Vijesti (datum, naslov, sazetak, tekst, slika, kategorija, 
arhiva ) VALUES ('$date', '$title', '$about', '$content', '$picture', 
'$category', '$archive')";
$result = mysqli_query($dbc, $query) or die('Error querying databese.');
mysqli_close($dbc);

