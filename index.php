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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Neuen Eintrag hinzufügen / Add new Entry</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>

    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/tree_styles.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/jquery-ui.custom.css" type="text/css" media="screen"/>

    <!--<script type="text/javascript" src="js/minified/jquery.min.js"></script>-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.ui.core.js"></script>
    <script type="text/javascript" src="js/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="js/cat_tree.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#treenode').treeNode();
        });
    </script>
</head>
<body>

<form class="commentForm" action="addlisting.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Kategorien wählen / Choose Category</legend>
        <div id="treenode"></div>
        <div class="clearfix"></div>
    </fieldset>

    <input type="submit" value="Submit" style="float: right"/>

</form>

</body>
</html>
