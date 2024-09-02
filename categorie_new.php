<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Categorie - Ajout</title>
</head>

<body>

    <h1>Saisie d'une nouvelle categorie</h1>

    <a href="logged_session.php"><button>retour au compte</button></a>

    <br>
    <br>

    <form action="script_cat_ajout.php" method="post" enctype="multipart/form-data">

        <label for="libelle_for_label">Libelle :</label><br>
        <input type="text" name="libelle" id="libelle_for_label">
        <br><br>

        <label for="fileToUpload">Image:</label><br>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br><br>

        <input type="submit" value="Ajouter" name="submit">

    </form>
</body>

</html>