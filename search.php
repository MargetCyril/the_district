<?php
include "db.php";
$db = connexionBase();

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$search = test_input($_POST['recherche']);
$requete = $db->query("SELECT *
                        FROM categorie 
                        JOIN plat ON plat.id_categorie = categorie.id
                        WHERE categorie.libelle OR plat.libelle OR plat.description LIKE '%$search%'  ");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Acceuil</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        $titre = "Acceuil";
        include("header.php");
        ?>

        <div class="corps"><br>
            <div class="presentation">
                <div class="d-none d-md-block">
                    <h2>Nos Catégories</h2>
                    <div class="container-fluid">
                        <div class="row g-3">

                            <?php foreach ($tableau as $categorie): ?>
                                
                                <div class="col-md-6">
                                    <a href="plats_par_categorie.php?categorie=<?= $categorie->id; ?>" class="img-link">
                                        <img src="images_the_district/category/<?= $categorie->image ?>" class="img-link"
                                            alt="salade cesar"></a>
                                    <div><?= $categorie->libelle ?></div>
                                </div>

                        </div>
                    <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </div>



    <?php
    include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>


</html>