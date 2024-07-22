<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nom =$telephone = $email = $adresse = $question = "";

$nom = test_input($_POST["nom"]);
$telephone = test_input($_POST["telephone"]);
$email = $_POST["email"];
$adresse = $_POST["adresse"];
$question = $_POST["question"];

date_default_timezone_set('Europe/Paris');
$temps = date('Y-m-j-h-i-s');
$myfile = fopen("$temps.txt", "w") or die("unable to open file!");
$memoire = "nom: ".$nom." téléphone: ".$telephone." email: ".$email." adresse: ".$adresse. " question: ".$question;
fwrite( $myfile, $memoire);
fclose($myfile);
header('location:index.php');


?>