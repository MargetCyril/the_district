<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
date_default_timezone_set('Europe/Paris');
$nom = $telephone = $email = $adresse = $quantite = "";

$id_plat = test_input($_POST["id_plat"]);
$quantite = test_input($_POST["quantite"]);
$prix = test_input($_POST["prix"]);
$total = $prix * $quantite;
$date_commande = date('Y-m-j h-i-s');
$etat = "En préparation";
$nom_client = test_input($_POST["nom"]);
$telephone_client = test_input($_POST["telephone"]);
$email_client = test_input($_POST["email"]);
$adresse_client = test_input($_POST["adresse"]);


require "db.php";
$db = connexionBase();

try {
    $requete = $db->prepare("INSERT INTO commande (id_plat, quantite, total, date_commande, etat, nom_client, telephone_client, email_client, adresse_client) VALUES (:id_plat, :quantite, :total, :date_commande, :etat, :nom_client, :telephone_client, :email_client, :adresse_client);");

    // :id_plat, :quantite, :total, :date_commande, :etat, :nom_client, :telephone_client, :email_client, :adresse_client
    $requete->bindvalue(":id_plat", $id_plat, PDO::PARAM_INT);
    $requete->bindvalue(":quantite", $quantite, PDO::PARAM_INT);
    $requete->bindvalue(":total", $total, PDO::PARAM_STR);
    $requete->bindvalue(":date_commande", $date_commande, PDO::PARAM_STR);
    $requete->bindvalue(":etat", $etat, PDO::PARAM_STR);
    $requete->bindvalue(":nom_client", $nom_client, PDO::PARAM_STR);
    $requete->bindvalue(":telephone_client", $telephone_client, PDO::PARAM_STR);
    $requete->bindvalue(":email_client", $email_client, PDO::PARAM_STR);
    $requete->bindvalue(":adresse_client", $adresse_client, PDO::PARAM_STR);


    $requete->execute();
    $requete->closeCursor();
} catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $e->getMessage() . "<br>";
    die("Fin du script (commande_result.php)");
}

header("Location: index.php");

exit;
