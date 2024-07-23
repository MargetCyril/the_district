<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
</head>
<body>

<form method="POST" action=login_script.php id=login_form>
    <label for="login">Login</label>
    <input type="text" name="login" id="login" required>
    <br>
    <label for="password">mot de passe</label>
    <input type="text" name="password" id="password" required> 
    <?php
    if ($_SESSION["login"] == "unknown") {
        echo "identifiant ou mot de passe incorrect";
    }
    ?>
    <button type="submit" class="btn btn-dark">Envoyer</button>


</form>

</body>
</html>