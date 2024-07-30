<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Plats par categories</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        $titre = "Plats par Catégorie";
        include("header.php");
        ?>
        
        <div class="corps">
            <br>
            <div class="presentation">
                <div class="d-none d-md-block">
                    <h2> Tout nos trucs de ce machin</h2><br>
            <a href="commande.php">
            <div class="plats"> 
                <img src="images_the_district/food/cesar_salad.jpg" class="img-plat" alt="salade cesar">
                <p class="legende autoscroll">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor,
                    dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.
                </p>
            
            </div>
        </a>
            <br>
            <a href="commande.php">
            <div class="plats">
                <img src="images_the_district/food/cesar_salad.jpg" class="img-plat" alt="salade cesar">
                <p class="legende autoscroll">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor,
                    dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.
                </p>
            </div>
        </a>
            <br>
            <a href="commande.php">
            <div class="plats">
                <img src="images_the_district/food/cesar_salad.jpg" class="img-plat" alt="salade cesar">
                <p class="legende autoscroll">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor,
                    dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.
                </p>
            </div>
        </a>
            <br>
            <a href="commande.php">
            <div class="plats">
                <img src="images_the_district/food/cesar_salad.jpg" class="img-plat" alt="salade cesar">
                <p class="legende autoscroll">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor,
                    dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.
                </p>
            </div>
        </a>
            <br>
        </div>
    </div>
    <?php
        include("footer.php");
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>