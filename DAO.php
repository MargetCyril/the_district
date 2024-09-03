<?php
include "db.php";
$db = connexionBase();


class DAO {

    public $_table;
    public $_db;

public function __construct($table,$db) {
    $this->_table = $table;
    $this->_db = $db;


}



    private function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function get_categorie($db,$table) {
        $requete = $db->query("SELECT *
        FROM $table" );
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();
return $tableau;

    }
}

$db = connexionBase();