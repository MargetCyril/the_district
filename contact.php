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
        $titre = "Contact";
        include("header.php");
        ?>
        
        <div class="corps">

<div class="form-group mx-5">
            <form method="POST" action="form_contact.php" onsubmit="return checkform1(this)" id="formulaire_contact" class="row g-3">

                <h1>Contact</h1>

                <div class="col-12">
                    <label for="nom">Nom et prénom:</label>
                    <input type="text" name="nom" id="nom" class="form-control" required>
                    <span class="form-text" style="color:red">Ce champs est obligatoire</span>
                    <p id="erreur_nom" class="red"></p>
                </div>
                <div class="col-md-6">
                    <label for="telephone">Téléphone:</label>
                    <input type="text" name="telephone" id="telephone" class="form-control" required>
                    <span class="form-text" style="color:red">Ce
                        champs est obligatoire</span>
                    <p id="erreur_telephone" class="red"></p>
                </div>
                <div class="col-md-6">
                    <label for="email">Email</label><input type="email" name="email" id="email" class="form-control" required ><span
                        class="form-text" style="color:red">Ce champs est obligatoire</span>
                    <p id="erreur_mail" class="red"></p>
                </div>
                <div class="col-12">
                    <label for="adresse">Adresse:</label><input type="text" name="adresse" id="adresse" class="form-control" required><span
                        class="form-text" style="color:red">Ce champs est
                        obligatoire</span>
                    <p id="erreur_adresse" class="red"></p>
                </div>
                <div class="col-12">
                    <label for="question">Votre question</label> <textarea name="question" id="question"
                        value="" class="form-control"></textarea>
                        <span class="form-text" style="color:red">ce champs est
                        obligatoire</span>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-dark">Envoyer</button>
                    <button type="reset" class="btn btn-dark">Annuler</button>
                </div>
                <br><br>
            </form>
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