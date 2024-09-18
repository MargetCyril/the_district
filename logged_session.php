<?php
session_start();

include "DAO.php";

$da0 = new DAO("categorie", NULL, NULL);
$tableau = $da0->get_all();

$da1 = new DAO("plat", NULL, NULL);
$tableau1 = $da1->get_all();

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
                <form method="POST" action="script_plat_ajout.php" enctype="multipart/form-data" id="form_ajout_plat" class="row g-3" style="display: none;">
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
                        <select name="categorie" id="categorie">
                            <option value=""> Choissisez la catégorie </option>
                            <?php foreach ($tableau as $categorie): ?>
                                <option value="<?= $categorie->id ?>"><?= $categorie->libelle ?></option>
                            <?php endforeach ?>
                        </select>

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
            </div>


            <br>
            <button onclick="showForm('form_modif_plat')">Modifier un plat</button>

            <div class="form-group mx-5">
                <form method="POST" action="script_plat_modif.php" enctype="multipart/form-data" id="form_modif_plat" class="row g-3" style="display: none;">
                    <fieldset>

                        <label for="plat1">Plat :</label><br>
                        <select name="plat1" id="plat1">
                            <option value=""> Choissisez le plat à modifier </option>
                            <?php foreach ($tableau1 as $plat): ?>
                                <option value="<?= $plat->id ?>"><?= $plat->libelle ?></option>
                            <?php endforeach ?>
                        </select>


                        <script>
                            document.getElementById("plat1").addEventListener("change", plat_menu_listener);

                            function plat_menu_listener() {
                                let plat = document.getElementById("plat1").value;
                                const data = {
                                    id: plat
                                };
                                fetch('script_plat_modif_menu.php', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify(data)
                                    })
                                    .then(response => response.json())
                                    .then(result => {
                                        console.log('Success:');
                                        console.log(result)
                                        document.getElementById("libelle0").setAttribute("value", result[0].libelle)
                                        document.getElementById("fileToUpload0").setAttribute("value", result[0].image)
                                        document.getElementById("prix0").setAttribute("value", result[0].prix)
                                        document.getElementById("description0").value = result[0].description

                                        let cat = result[0].id_categorie;
                                        const data1 = {
                                            id: cat
                                        };
                                        fetch('script_plat_cat.php', {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json'
                                                },
                                                body: JSON.stringify(data1)
                                            })
                                            .then(response => response.json())
                                            .then(result => {
                                                console.log('Success:');
                                                console.log(result[0].libelle)

                                                document.getElementById("categorie0").setAttribute("value", result[0].id)
                                                document.getElementById("categorie0").innerHTML = result[0].libelle 

                                            })
                                            .catch(error => {
                                                console.error('Error:', error);
                                            });

                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                    });
                            }
                        </script>

                        <div class="col-3">
                            <label for="libelle0">libelle:</label>
                            <input type="text" name="libelle0" id="libelle0" class="form-control" value="<?= $plat->libelle ?>">
                        </div>

                        <div class="col-12">
                            <label for="description0">Description:</label> <textarea name="description0" id="description0" value="<?= $plat->libelle ?>"
                                class="form-control"></textarea>
                        </div>

                        <div class="col-3">
                            <label for="prix0">Prix:</label>
                            <input type=number name="prix0" id="prix0" class="form-number" value="" required>
                        </div>

                        <div class="col-12">
                            <label for="fileToUpload0">Image:</label><br>
                            <input type="file" name="fileToUpload0" id="fileToUpload0">
                        </div>

                        <label for="categorie0">Catégorie :</label><br>
                        <select name="categorie0" id="categorie0">
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
            </div>

            <br>
            <button onclick="showForm('form_ajout_cat')">Ajouter une catégorie</button>

            <div class="form-group mx-5">
                <form method="POST" enctype="multipart/form-data" action="script_cat_ajout.php" onsubmit="return checkform3(this)" id="form_ajout_cat" class="row g-3" style="display: none;">
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
            </div>


            <br>
            <button onclick="showForm('form_cat_modif')">Modifier une categorie</button>

            <div class="form-group mx-5">
                <form method="POST" enctype="multipart/form-data" action="script_cat_modif.php" onsubmit="return checkform3(this)" id="form_cat_modif" class="row g-3" style="display: none;">
                    <fieldset>

                        <label for="categorie1">Catégorie :</label><br>
                        <select name="categorie1" id="categorie1">
                            <option value=""> Choissisez la catégorie </option>
                            <?php foreach ($tableau as $categorie): ?>
                                <option value="<?= $categorie->id ?>"><?= $categorie->libelle ?></option>
                            <?php endforeach ?>
                        </select>
                        <br><br>

                        <script>
                            document.getElementById("categorie1").addEventListener("change", cat_menu_listener);

                            function cat_menu_listener() {
                                let cat = document.getElementById("categorie1").value;
                                const data = {
                                    id: cat
                                };
                                fetch('script_cat_modif_menu.php', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify(data)
                                    })
                                    .then(response => response.json())
                                    .then(result => {
                                        console.log('Success:');
                                        console.log(result[0].id)
                                        document.getElementById("libelle1").setAttribute("value", result[0].libelle)
                                        document.getElementById("fileToUpload1").setAttribute("value", result[0].image)

                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                    });



                            }
                        </script>

                        <div class="col-3">
                            <label for="libelle1">libelle:</label>
                            <input type="text" name="libelle1" id="libelle1" class="form-control" value="">
                        </div>

                        <div class="col-12">
                            <label for="fileToUpload1">Image:</label><br>
                            <input type="file" name="fileToUpload1" id="fileToUpload1" value="">
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
            </div>
            <br>


        </div>

        <?php
        include("footer.php");
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="form.js"></script>

    </div>
</body>

</html>