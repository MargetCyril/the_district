<?php
include "DAO.php";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$id_plat = (test_input($_GET['plat']));

$da0 = new DAO("plat", NULL, NULL);
$tableau = $da0->get_plat($id_plat);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Contact</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        $titre = "Commande";
        include("header.php");
        ?>

        <div class="corps">
            <h1 class="ms-5">Votre commande:</h1>
            <?php foreach ($tableau as $plat): ?>
                <div class="plats">
                    <img src="images_the_district/food/<?= $plat->image; ?>" class="img-plat" alt="salade cesar">

                    <p class="legende autoscroll">
                        <?= $plat->libelle; ?>
                        <br>
                        <?= $plat->description; ?>
                        <br>
                        <?= $plat->prix; ?>€
                    </p>
                <?php endforeach ?>
                </div>
                <br>
                <div class="form-group mx-5">
                    <form method="post" action="commande_result.php" onsubmit="return checkform2(this)" id="formulaire_contact" class="row g-3">

                        <div class="col-3">
                            <label for="quantite"> Quantité:</label>
                            <input type=number name="quantite" id="quantite" class="form-number" min="1" value="1" required>
                        </div>
                        <div class="col-3">
                            <label for="id_plat"></label>
                            <input type=number name="id_plat" id="id_plat" class="form-number" value=<?=$id_plat?> hidden >
                        </div>
                        <div class="col-3">
                            <label for="libelle"></label>
                            <input type=text name="libelle" id="libelle" class="form-control" value=<?=$plat->libelle?> hidden >
                        </div>

                        <div class="col-3">
                            <label for="prix"></label>
                            <input type=number name="prix" id="prix" class="form-number" value=<?=$plat->prix?> hidden >
                        </div>

                        <div class="col-12">
                            <label for="nom">Nom et prénom:</label>
                            <input type="text" name="nom" id="nom" class="form-control" required>
                            <span class="form-text" style="color:red">ce champ est obligatoire</span>
                            <p id="erreur_nom" class="red"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="telephone">Téléphone:</label>
                            <input type="text" name="telephone" id="telephone" class="form-control">
                            <span class="form-text" style="color:red">ce
                                champ est obligatoire</span>
                            <p id="erreur_telephone" class="red"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label><input type="email" name="email" id="email" class="form-control"
                                required><span class="form-text" style="color:red">ce champ est obligatoire</span>
                            <p id="erreur_mail" class="red"></p>
                        </div>
                        <div class="col-12">
                            <label for="adresse">Adresse:</label> <textarea name="adresse" id="adresse" value=""
                                class="form-control"></textarea>
                            <span class="form-text" style="color:red">ce champ est
                                obligatoire</span>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-dark">Envoyer</button>
                            <button type="reset" class="btn btn-dark">Annuler</button>
                        </div>
                    </form>
                    <br><br>
                </div>

        </div>
    </div>
    <?php
    include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="form.js"></script>
</body>

</html>