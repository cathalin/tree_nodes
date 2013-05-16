<?php
/**
 * User: patric gutersohn
 * Date: 14.05.13
 * Time: 19:53
 */
namespace library;

include_once 'DatabaseConnection-bak.php';

class TreeNodesHelper extends DatabaseConnection
{

    public function __construct()
    {
        //the name of the table
        $tablename = 'category';
        //column name - stores the number of the parent id
        $id_parent = 'id_parent';

        $this->tablename = $tablename;
        $this->id_parent = $id_parent;

        $dbConnection = new DatabaseConnection();
        $this->dbConnection = $dbConnection;
    }

    public function getParents()
    {
        $parents = $this->dbConnection->query("SELECT * FROM $this->tablename WHERE $this->id_parent LIKE 0");

        return $parents;
    }

    public function getSubcategories($id)
    {
        $sub = $this->dbConnection->query("SELECT * FROM $this->tablename WHERE $this->id_parent LIKE $id");

        return $sub;
    }

    public function getSubSubcategories($id_sub)
    {
        $sub_sub = $this->dbConnection->query("SELECT * FROM $this->tablename WHERE $this->id_parent LIKE $id_sub");
        $sub_sub_count = $this->dbConnection->count();
        $this->sub_sub_count = $sub_sub_count;

        return $sub_sub;
    }

    public function getSubSubCount()
    {
        return $this->sub_sub_count;
    }

}

