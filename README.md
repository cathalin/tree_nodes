tree_nodes
==========

With this script you can build a multilevel Treeview from categories stored in a database.

![](http://ladensia.com/tree_node/images/tree_node.png)

## [Help the project](http://pledgie.com/campaigns/20120)

[![Help the project](http://www.pledgie.com/campaigns/20120.png?skin_name=chrome)](http://pledgie.com/campaigns/20120)

Installation
------------

Just download the script, upload the tree_node.sql file to your database named 'tree_nodes' for the base structure and add your database configurations to library/DatabaseConnection.php

If you don't wanna use this structure you can edit the library/TreeNodes.php file to your needs.

Usage
-----

Just add a css id to the element you want to load the multilevel Treeview like this:

`<div id="yourid"></div>`

to initialize the multilevel Treeview add the following to your javascript, after you integrated jquery and cat_tree.js

`$(document).ready(function () {
      $('#yourid').treeNode();
});`

Demo
----

You can see a demo here http://ladensia.com/tree_node/

Version / License 
-----------------

Current version: 1.0.0

License: MIT/GPL

Requirements
------------

jQuery 1.8.x+, tested with 1.9.1
