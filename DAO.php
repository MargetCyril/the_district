<?php
include "db.php";
$db = connexionBase();


class DAO
{

    public $_table;
    public $_table2;
    public $_table3;

    public function __construct($table, $table2, $table3)
    {
        $this->_table = $table;
        $this->_table2 = $table2;
        $this->_table3 = $table3;
    }

    public function get_limited($limit, $debut)
    {
        $db = connexionBase();
        $requete = $db->query("SELECT * FROM $this->_table WHERE active = 'Yes' LIMIT $limit OFFSET $debut  ");
        $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
        return $tableau;
        $requete->closeCursor();
    }

    public function get_total($limit)
    {
        $db = connexionBase();
        $requete = $db->query("SELECT count(id)FROM " . $this->_table . " WHERE active = 'Yes' ");
        $elementtotal = $requete->fetchColumn();
        $pagetotal = ceil($elementtotal / $limit);
        return $pagetotal;
        $requete->closeCursor();
    }

    public function get_index($limit)
    {
        $db = connexionBase();
        $requete = $db->query("SELECT $this->_table.libelle, $this->_table.image, $this->_table.id
                        FROM $this->_table 
                        JOIN $this->_table2 ON $this->_table.id = $this->_table2.id_$this->_table
                        JOIN $this->_table3 ON $this->_table2.id = $this->_table3.id_$this->_table2
                        GROUP BY $this->_table.id
                        ORDER BY SUM(quantite) DESC
                        LIMIT $limit");
        $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
        return $tableau;
        $requete->closeCursor();
    }

    public function get_index2($limit)
    {
        $db = connexionBase();
        $requete = $db->query("SELECT $this->_table.libelle, $this->_table.image, $this->_table.id
                        FROM $this->_table 
                        JOIN $this->_table2 ON $this->_table2.id = $this->_table.id_$this->_table2
                        JOIN $this->_table3 ON $this->_table3.id_$this->_table = $this->_table.id
                        GROUP BY $this->_table.id
                        ORDER BY SUM(quantite) DESC
                        LIMIT $limit");
        $tableau2 = $requete->fetchAll(PDO::FETCH_OBJ);
        return $tableau2;
        $requete->closeCursor();
    }

    public function get_plat($plat)
    {
        $db = connexionBase();
        $requete = $db->query("SELECT * 
        FROM plat 
        WHERE id = $plat");
        $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
        return $tableau;
        $requete->closeCursor();
    }

    public function get_platcat($category, $limit, $debut)
    {
        $db = connexionBase();
        $requete = $db->query("SELECT $this->_table.*,  $this->_table2.libelle AS cat
                        FROM $this->_table 
                        JOIN $this->_table2 ON $this->_table.id_$this->_table2 = $this->_table2.id
                        WHERE $this->_table.active = 'Yes' AND id_$this->_table2 = $category
                        LIMIT $limit 
                        OFFSET $debut ");
        $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
        return $tableau;
        $requete->closeCursor();
    }

    public function get_totalcat($category, $limit)
    {
        $db = connexionBase();
        $requete = $db->query("SELECT count(id)FROM $this->_table; 
                        WHERE active = 'Yes' AND id_categorie = $category");
$elementtotal = $requete->fetchColumn();
$pagetotal = ceil($elementtotal / $limit);
return $pagetotal;
$requete->closeCursor();
    }
}
