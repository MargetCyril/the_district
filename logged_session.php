<?php
session_start();

include "db.php";
$db = connexionBase();


function commande(){
    $requete = $db->query("SELECT libelle, total, date_commande, nom_client, telephone_client, adresse_client FROM commande JOIN plat ON commande:id_plat = plat:id");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();
 ?>
<table>
            <thead>
                <tr>
                    <th>date</th>
                    <th>nom client</th>
                    <th>téléphone client</th>
                    <th>adresse client</th>
                    <th>plat</th>
                    <th>prix</th>
                </tr>
            </thead>

            <tbody>;
<?php foreach ($tableau as $commande): ?>
<tr>
                    <td><?=$commande->date_commande?></td>
                    <td><?=$commande->nom_client?></td>
                    <td><?=$commande->téléphone_client?></td>
                    <td><?=$commande->adresse_client?></td>
                    <td><?=$commande->plat?></td>
                    <td><?=$commande->total?></td>
                </tr>
               <?php endforeach; } ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>dasboard admin</title>
</head>
<body>
<div class="container-fluid">
<div class="corps">
    
<?php
$titre = "Commande";
        include("header.php");
   if ($_SESSION["login"] == "admin") {
    echo 'Bienvenue '.$_SESSION["login"];
}
else {
    echo "Vous n'êtes pas autorisé à être ici";
}    
?>

<button type="button" onclick="commande()">liste des commandes </button>

<br>
<a href="logout.php">déconnexion</a>
<br><br>
<a href="">modifier un plat</a>
<br><br>
<a href="">modifier une catégorie</a>
</div>

</body>
</html>

