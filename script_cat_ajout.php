<?php
if (isset($_POST['libelle']) && $_POST['libelle'] != "") {
    $libelle = $_POST['libelle'];
}
else {
    $libelle = Null;
}

$target_dir = "images_the_district/category/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false){
        echo "File is an image - ".$check["mime"].".";
        $uploadOK = 1;
    } else {
        echo "File is not an image.";
        $uploadOk=0;
    }
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $img = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
      echo "The file ".$img. " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

if ($libelle == Null || $img == Null) {
    echo $titre . " ".$img;
    exit;
}

require "db.php";
$db = connexionBase();

try {
    $requete = $db->prepare("INSERT INTO categorie (libelle, image, active) VALUES (:libelle, :img, 'Yes');");

    $requete->bindvalue(":libelle", $libelle, PDO::PARAM_STR);
    $requete->bindvalue(":img", $img, PDO::PARAM_STR);

    $requete->execute();
    $requete->closeCursor();
}
catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : ". $e->getMessage()."<br>";
    die("Fin du script (script_disc_ajout.php)");
}

header("Location: logged_session.php");

exit;
?>