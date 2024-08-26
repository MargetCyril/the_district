<?php
function ConnexionBase() {
    try
    {
        $connexion = new PDO('mysql:host=localhost;charset=utf8;dbname=the_district', 'admin', '3224');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;

        
    } catch (Exception $e){
        echo "Erreur : ".$e->getMessage() . "<br>";
        echo "N° : ".$e->getCode();
        die ("Fin du script");        
    }
}
?>