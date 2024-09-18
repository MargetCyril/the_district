<?php

include "db.php";
$pdo = connexionBase();

// Récupérer les données JSON envoyées
$data = json_decode(file_get_contents('php://input'), true);
// Vérifier si les données sont bien reçues
if ($data) {
    $id = intval($data['id']);  // Exemple d'extraction de l'ID
error_log("id= ".var_export($id,true));
    // Exemple de requête SQL
    $stmt = $pdo->prepare('SELECT * 
        FROM categorie 
        WHERE id = :id ');
    $stmt->execute(['id' => $id]);

    // Récupérer les résultats de la requête
    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retourner le résultat en JSON
    echo json_encode($resultat);
} else {
    echo json_encode(['error' => 'No data received']);
}
