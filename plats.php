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

$page = (!empty(test_input($_GET['page'])) ? test_input($_GET['page']) : 1);
$limit = 6;
$debut = ($page - 1) * $limit;
$requete = $db->query("SELECT * 
                        FROM plat 
                        WHERE active = 'Yes'
                        LIMIT $limit 
                        OFFSET $debut ");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();
$requete = $db->query("SELECT count(id)FROM plat WHERE active = 'Yes' ");
$elementtotal = $requete->fetchColumn();
$pagetotal = ceil($elementtotal / $limit);
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
    <title>Plats</title>
</head>

<body>
    <div class="container-fluid">

        <?php
        $titre = "Plats";
        include("header.php");
        ?>

        <div class="corps">

            <div class="presentation"><br>
               <!-- <h2> Tout nos plats</h2> -->

                <?php foreach ($tableau as $plat): ?>

                    <br><a href="commande.php?plat=<?=$plat->id; ?>">

                        <div class="plats">
                            <img src="images_the_district/food/<?= $plat->image ?>" class="img-plat" alt="salade cesar">

                            <p class="legende autoscroll">
                                <?= $plat->libelle ?>
                                <br>
                                <?= $plat->description ?>
                                <br>
                                <?= $plat->prix ?>€
                            </p>

                        </div>
                    </a>
                    <br>
                <?php endforeach ?>

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
        </div>
        <?php
        include("footer.php");
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>