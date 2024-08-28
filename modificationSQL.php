<?php

include "db.php";
$db = connexionBase();

$requete = $db->query("DELETE FROM plat
                        WHERE active = 'No'");
$requete->closeCursor();
?>
                    
<?php
$requete = $db->query("DELETE FROM commande
                        WHERE etat = 'Livrée'");
$requete->closeCursor();
?>

                   
<?php
$requete = $db->query("UPDATE plat
                        set prix = prix * 1.1
                        WHERE id_categorie = '4'");
$requete->closeCursor();
?>
