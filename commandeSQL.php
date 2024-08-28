<?php

include "db.php";
$db = connexionBase();

$requete = $db->query("SELECT libelle, total, date_commande, nom_client, telephone_client, adresse_client FROM commande JOIN plat ON commande.id_plat = plat.id");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();
 ?>
<table>
            <thead>
                <tr>
                    <th>date</th>
                    <th>nom client</th>
                    <th>téléphone client</th>
                    <th>adresse client</th>
                    <th>plat</th>
                    <th>prix</th>
                </tr>
            </thead>

            <tbody>
<?php foreach ($tableau as $commande): ?>
<tr>
                    <td><?=$commande->date_commande?></td>
                    <td><?=$commande->nom_client?></td>
                    <td><?=$commande->telephone_client?></td>
                    <td><?=$commande->adresse_client?></td>
                    <td><?=$commande->libelle?></td>
                    <td><?=$commande->total?></td>
                </tr>
               <?php endforeach;  ?>

<br>
<br>

<?php

$requete = $db->query("SELECT plat.libelle AS 'plat', categorie.libelle AS 'categorie' FROM plat JOIN categorie ON plat.id_categorie = categorie.id");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();
 ?>
 <table>
            <thead>
                <tr>
                    <th>plat</th>
                    <th>categorie</th>
                </tr>
            </thead>

            <tbody>
<?php foreach ($tableau as $plat): ?>
<tr>
                    <td><?=$plat->plat?></td>
                    <td><?=$plat->categorie?></td>
                </tr>
               <?php endforeach;  ?>

<br>
<br>

<?php

$requete = $db->query("select categorie.libelle AS 'categorie', count(plat.active) AS 'nombre_de_plat' FROM categorie  JOIN plat ON plat.id_categorie = categorie.id group by id_categorie");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();
 ?>
 <table>
            <thead>
                <tr>
                    <th>categorie</th>
                    <th>nombre de plat</th>
                </tr>
            </thead>

            <tbody>
<?php foreach ($tableau as $plat): ?>
<tr>
                    <td><?=$plat->categorie?></td>
                    <td><?=$plat->nombre_de_plat?></td>
                </tr>
               <?php endforeach;  ?>

<br>
<br>

<?php

$requete = $db->query("SELECT plat.libelle, SUM(quantite) AS quantite_produit FROM commande JOIN plat ON commande.id_plat = plat.id GROUP BY id_plat ORDER BY quantite_produit DESC");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();
 ?>
 <table>
            <thead>
                <tr>
                    <th>Plat</th>
                    <th>quantité</th>
                </tr>
            </thead>

            <tbody>
<?php foreach ($tableau as $plat): ?>
<tr>
                    <td><?=$plat->libelle?></td>
                    <td><?=$plat->quantite_produit?></td>
                </tr>
               <?php endforeach;  ?>

<br>
<br>


<?php

$requete = $db->query("SELECT plat.libelle, SUM(total) AS total_produit 
                        FROM commande
                        JOIN plat ON commande.id_plat = plat.id
                        GROUP BY id_plat
                        ORDER BY total_produit DESC
                        limit 1");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();
 ?>
 <table>
            <thead>
                <tr>
                    <th>Plat</th>
                    <th>total</th>
                </tr>
            </thead>

            <tbody>
<?php foreach ($tableau as $plat): ?>
<tr>
                    <td><?=$plat->libelle?></td>
                    <td><?=$plat->total_produit?></td>
                </tr>
               <?php endforeach;  ?>

<br>
<br>

<?php

$requete = $db->query("SELECT nom_client, SUM(total) AS chiffre_affaire 
                        FROM commande
                        WHERE etat != 'Annulée'
                        GROUP BY nom_client 
                        ORDER BY chiffre_affaire DESC");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();
 ?>
 <table>
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Chiffre d'affaire généré</th>
                </tr>
            </thead>

            <tbody>
<?php foreach ($tableau as $commande): ?>
<tr>
                    <td><?=$commande->nom_client?></td>
                    <td><?=$commande->chiffre_affaire?></td>
                </tr>
               <?php endforeach;  ?>

<br>
<br>
