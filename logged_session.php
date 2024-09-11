<?php
session_start();

include "DAO.php";

$da0 = new DAO("categorie", NULL, NULL);
$tableau = $da0->get_all();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>dasboard admin</title>
</head>

<body>
    <div class="container-fluid">
        <div class="corps">

            <?php
            $titre = "Dashboard admin";
            include("header.php");
            if ($_SESSION["login"] == "admin") {
                echo 'Bienvenue ' . $_SESSION["login"];
            } else {
                echo "Vous n'êtes pas autorisé à être ici";
            }
            ?>

            <button type="button" onclick="commande()">liste des commandes </button>

            <script type="text/javascript">
                function showForm(arg) {
                    var cache = getComputedStyle(document.getElementById(arg)).getPropertyValue('display');
                    if (cache == 'none') {
                        document.getElementById(arg).style.display = 'block';
                    } else {
                        document.getElementById(arg).style.display = 'none';
                    }
                }
            </script>

            <br>
            <a href="logout.php">déconnexion</a>
            <br><br>
            <button onclick="showForm('form_ajout_plat')">Ajouter un plat</button>

            <div class="form-group mx-5">
                <form method="post" action="" onsubmit="return checkform2(this)" id="form_ajout_plat" class="row g-3" style="display: none;">
                    <fieldset>
                        <div class="col-3">
                            <label for="libelle">libelle:</label>
                            <input type="text" name="libelle" id="libelle" class="form-control" value="">
                        </div>

                        <div class="col-12">
                            <label for="description">Description:</label> <textarea name="description" id="description" value=""
                                class="form-control"></textarea>
                        </div>

                        <div class="col-3">
                            <label for="prix">Prix:</label>
                            <input type=number name="prix" id="prix" class="form-number" value="" required>
                        </div>

                        <div class="col-12">
                            <label for="fileToUpload">Image:</label><br>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>

                        <label for="categorie">Catégorie :</label><br>
                        <select name="categorie" id="ategorie">
                            <option value=""> Choissisez la catégorie </option>
                            <?php foreach ($tableau as $categorie): ?>
                                <option value="<?= $categorie->id ?>"><?= $categorie->libelle ?></option>
                            <?php endforeach ?>
                        </select>
                        <br><br>

                        <div class="col-12">
                            <button type="submit" class="btn btn-dark">Envoyer</button>
                            <button type="reset" class="btn btn-dark">Annuler</button>
                        </div>
                    </fieldset>
                </form>

                <br><br>
                <a href="categorie_new.php">modifier une catégorie</a>
            </div>

            <br><br>
            <button onclick="showForm('form_ajout_cat')">Ajouter une catégorie</button>

            <div class="form-group mx-5">
                <form method="post" action="" onsubmit="return checkform2(this)" id="form_ajout_cat" class="row g-3" style="display: none;">
                    <fieldset>
                        <div class="col-3">
                            <label for="libelle">libelle:</label>
                            <input type="text" name="libelle" id="libelle" class="form-control" value="">
                        </div>

                        <div class="col-12">
                            <label for="fileToUpload">Image:</label><br>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>

                        <label for="active">Active :</label><br>
                        <select name="active" id="active">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                        <br><br>

                        <div class="col-12">
                            <button type="submit" class="btn btn-dark">Envoyer</button>
                            <button type="reset" class="btn btn-dark">Annuler</button>
                        </div>
                    </fieldset>
                </form>

                <?php
                include("footer.php");
                ?>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="form.js"></script>
</body>

</html>