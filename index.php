<?php
include "DAO.php";

$da0= new DAO("categorie","plat","commande");
$tableau=$da0->get_index("6");

$da1= new DAO("plat","categorie","commande");
$tableau2=$da1->get_index2("6");


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
                                    <a href="plats_par_categorie.php?categorie=<?=$categorie->id; ?>" class="img-link">
                                        <img src="images_the_district/category/<?= $categorie->image ?>" class="img-link"
                                            alt="salade cesar"></a>
                                    <div class="cache"><?= $categorie->libelle ?></div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <br>
                <div class="d-block">
                    <h2>Nos Plats</h2><br>
                    <div class="container-fluid">
                        <div class="row g-3">

                            <?php foreach ($tableau2 as $plat): ?>
                                <div class="col-md-6">
                                    <a href="commande.php?plat=<?=$plat->id; ?>">
                                        <img src="images_the_district/food/<?= $plat->image ?>" class="img-link"
                                            alt="salade cesar"></a>
                                    <div class="cache"><br><?= $plat->libelle ?></div>

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