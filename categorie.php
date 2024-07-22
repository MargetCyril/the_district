<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Categorie</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        $titre = "Catégorie";
        include("header.php");
        ?>

        <div class="corps">
            <div class="presentation">
                <div class="d-none d-md-block">
                    <h2> Catégories</h2>
                    <div class="container-fluid">
                        <div class="row g-3">

                            <div class="col-md-6">
                                <a href="plats_par_categorie.php" class="img-link">
                                    <img src="images_the_district/food/cesar_salad.jpg" class="img-link"
                                        alt="salade cesar"></a>
                                <div class="cache">salade cesar</div>
                            </div>

                            <div class="col-md-6">
                                <a href="plats_par_categorie.php" class="img-link"><img
                                        src="images_the_district/food/Food-Name-3631.jpg" class="img-link"
                                        alt="salade cesar"></a>
                                <div class="cache">salade cesar</div>
                            </div>

                            <div class="col-md-6">
                                <a href="plats_par_categorie.php" class="img-link padtest"><img
                                        src="images_the_district/food/buffalo-chicken.webp" class="img-link"
                                        alt="salade cesar"></a>
                                <div class="cache">salade cesar</div>
                            </div>

                            <div class="col-md-6">
                                <a href="plats_par_categorie.php" class="img-link padtest"><img
                                        src="images_the_district/food/courgettes_farcies.jpg" class="img-link"
                                        alt="salade cesar"></a>
                                <div class="cache">salade cesar</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>