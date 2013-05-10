<?php
/**
 * Tree Nodes
 *
 * @author patric gutersohn
 */

include_once 'db_mysql.php';

/*
* table details - you need to change this details if you want to use a other table then the one i used in the demo
*/
//the name of the table
$tablename = 'category';

/*
* column names
*/
//stores the number of the parent id 
//main categories have all the id_parent = 0; 
//child categories have the id of theis parents in this column
$id_parent = 'id_parent';

//first sub
$node1 = 0;
//second sub
$node2 = 55;

//open connection
$dbConnection = new dbConnection();
//parent nodes
$parents = $dbConnection->query("SELECT * FROM $tablename WHERE $id_parent LIKE 0");

?>

<ul id="cat_tree" name="cat_tree">
    <?php while ($parent = mysql_fetch_array($parents)) { ?>
        <li>
            <a href="#cat_tree" onclick="toggle('node<?php echo $node1; ?>')">
                <span class="icon_plus"></span>
                <span class="icon_folder"></span>
                <?php echo $parent['name'];
                $id = $parent['id']; ?>
            </a>

            <!-- Sub Categories -->
            <ul id="node<?php echo $node1; ?>" class="parent" style="display:none">
                <?php $sub = $dbConnection->query("SELECT * FROM $tablename WHERE $id_parent LIKE $id"); ?>

                <?php while ($subcat = mysql_fetch_array($sub)) { ?>
                    <li class="sub">
                        <a href="#cat_tree" onclick="toggle('node<?php echo $node2; ?>')" style="float: left;">
                            <span class="icon_plus"></span> 
                            <span class="toggle icon_folder"></span> 
                            
                        </a>
                        <input type="checkbox" name="categorie[]" 
                               value="<?php echo $subcat['name'] . " - " . $subcat['id']; ?>" />
                        <?php echo $subcat['name']; $id_sub = $subcat['id']; ?>

                        <?php

                        $sub_sub = $dbConnection->query("SELECT * FROM $tablename WHERE $id_parent LIKE $id_sub");
                        $sub_sub_count = $dbConnection->count();

                        if ($sub_sub_count > 0) {
                            ?>
                            <ul id="node<?php echo $node2; ?>" style="display:none">
                                <?php while ($sub_subcat = mysql_fetch_array($sub_sub)) { ?>
                                    <li class="pointer">
                                            <span class="icon_file"></span>
                                        <input type="checkbox" name="categorie[]"
                                               value="<?php echo $sub_subcat['name'] . " - " . $sub_subcat['id']; ?>" />
                                        <?php echo $sub_subcat['name']; ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </li>
                    <?php

                    $node2++;

                } ?>

            </ul>
        </li>
    <?php $node1++;
    } ?>
</ul>




