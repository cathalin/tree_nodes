<?php
/**
 * Tree Nodes
 *
 * @author patric gutersohn
 */

include_once 'TreeNodesHelper.php';

$treeNodesHelper = new \library\TreeNodesHelper();

$node1 = 0;
$node_sub = 0;

$parents = $treeNodesHelper->getParents();

?>

<ul id="cat_tree" name="cat_tree">
    <?php while ($parent = mysql_fetch_array($parents)) { ?>
        <li class="parent">
            <a href="#cat_tree" onclick="toggle('node<?php echo $node1; ?>')">
                <span class="icon_plus"></span>
                <span class="icon_folder"></span>
                <?php echo $parent['name'];
                $id = $parent['id']; ?>
            </a>

            <!-- Sub Categories -->
            <ul id="node<?php echo $node1; ?>" class="sub" style="display:none">

                <?php $sub = $treeNodesHelper->getSubcategories($id); ?>
                <?php while ($subcat = mysql_fetch_array($sub)) { ?>
                    <li class="sub">
                        <a href="#cat_tree" onclick="" class="open_s_node" style="float: left;">
                            <span class="icon_plus"></span>
                            <span class="toggle icon_folder"></span>
                        </a>
                        <input type="checkbox" name="categorie[]"
                               value="<?php echo $subcat['name'] . " - " . $subcat['id']; ?>"/>
                        <?php echo $subcat['name'];
                        $id_sub = $subcat['id']; ?>

                        <?php $sub_sub = $treeNodesHelper->getSubSubcategories($id_sub);

                        if ($treeNodesHelper->getSubSubCount() > 0) {
                            ?>
                            <ul id="" class="s_node" style="display:none">
                                <?php while ($sub_subcat = mysql_fetch_array($sub_sub)) { ?>
                                    <li class="sub_sub pointer">
                                        <span class="icon_file"></span>
                                        <input type="checkbox" name="categorie[]"
                                               value="<?php echo $sub_subcat['name'] . " - " . $sub_subcat['id']; ?>"/>
                                        <?php echo $sub_subcat['name']; ?>
                                    </li>
                                <?php } ?>
                            </ul>
                            <?php $node_sub++;
                        } ?>
                    </li>
                <?php } ?>
            </ul>
        </li>
        <?php  $node1++;
    } ?>
</ul>




