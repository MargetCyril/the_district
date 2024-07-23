<?php
session_start();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>dasboard admin</title>
</head>
<body>
<div class="container-fluid">
<div class="corps">
    
<?php
$titre = "Commande";
        include("header.php");
   if ($_SESSION["login"] == "admin") {
    echo 'Bienvenue '.$_SESSION["login"];
}
else {
    echo "Vous n'êtes pas autorisé à être ici";
}    
?>


<br>
<a href="logout.php">déconnexion</a>
<br><br>
<a href="">modifier un plat</a>
<br><br>
<a href="">modifier une catégorie</a>
</div>

</body>
</html>

