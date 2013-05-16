<?php
/**
 * multilevel treeview plugin
 * Copyright (c) 2013 Patric Gutersohn
 * licensed under MIT.
 * Date: 16/05/2013
 *
 * Project Home:
 * http://ladensia.com/jquery-tree-node-plugin/
 */
namespace library;

include_once 'DatabaseConnection.php';

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

