<?php
include "DAO.php";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$page = (!empty(test_input($_GET['page'])) ? test_input($_GET['page']) : 1);
$limit = 6;
$debut = ($page - 1) * $limit;

$da0 = new DAO("categorie", NULL, NULL);
$tableau=$da0->get_limited( $limit, $debut);
$pagetotal=$da0->get_total( $limit, $debut);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Categorie</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        $titre = "Catégorie";
        include("header.php");
        ?>

        <div class="corps"><br>
            <div class="presentation">
               <!-- <h2> Catégories</h2> -->
                <div class="row g-3">

                    <?php foreach ($tableau as $categorie): ?>
                        <div class="col-md-6">
                        <a href="plats_par_categorie.php?categorie=<?=$categorie->id; ?>">
                                <img src="images_the_district/category/<?= $categorie->image ?>" class="img-link"
                                    alt="<?= $categorie->libelle ?>"></a>
                            <div class="cache"><?= $categorie->libelle ?></div>
                        </div>
                    <?php endforeach; ?><br>

                </div>
                <br>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item  <?php if ($page == 1) {
                                                    echo 'disabled';
                                                } ?> ">
                            <a class="page-link" href="?page=<?php echo $page - 1; ?>">page precedente</a>
                        </li>
                        <li class="page-item <?php if ($page == $pagetotal) {
                                                    echo 'disabled';
                                                } ?> ">
                            <a class="page-link" href="?page=<?php echo $page + 1; ?>">page suivante</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <br>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>