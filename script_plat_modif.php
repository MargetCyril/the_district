<?php
session_start();

if (isset($_POST['libelle']) && $_POST['libelle'] != "") {
    $libelle = $_POST['libelle'];
} else {
    $libelle = Null;
}
$description = (isset($_POST['description']) && $_POST['description'] != "") ? $_POST['description'] : Null;
$prix = (isset($_POST['prix']) && $_POST['prix'] != "") ? $_POST['prix'] : Null;
$categorie = (isset($_POST['categorie']) && $_POST['categorie'] != "") ? $_POST['categorie'] : Null;
$active = (isset($_POST['active']) && $_POST['active'] != "") ? $_POST['active'] : Null;
$id = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;

$target_dir = "images_the_district/food/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOK = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $img = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
        echo "The file " . $img . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if ($id == Null || $libelle == Null || $img == Null || $description == Null || $prix == Null || $categorie == Null || $active == Null) {
    echo $libelle . " " . $img ." ".$description . " " . $prix . " " . $categorie . " " . $active;
    exit;
}

require "db.php";
$db = connexionBase();

try {
    $requete = $db->prepare("UPDATE plat SET libelle = :libelle, description = :description, prix = :prix, image = :img, id_categorie = :categorie, active = :active WHERE id = :id");

 $requete->bindvalue(":id", $id, PDO::PARAM_STR);
    $requete->bindvalue(":libelle", $libelle, PDO::PARAM_STR);
    $requete->bindvalue(":img", $img, PDO::PARAM_STR);
    $requete->bindvalue(":prix", $prix, PDO::PARAM_INT);
    $requete->bindvalue(":categorie", $categorie, PDO::PARAM_STR);
    $requete->bindvalue(":active", $active, PDO::PARAM_STR);
    $requete->bindvalue(":description", $description, PDO::PARAM_STR);
    
    $requete->execute();
    $requete->closeCursor();
} catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $e->getMessage() . "<br>";
    die("Fin du script (script_plat_ajout.php)");
}

header("Location: logged_session.php");

exit;
