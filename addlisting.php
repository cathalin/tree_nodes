<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'library/db_mysql.php';

try {
    if (isset($_POST['categorie']) && $_POST['categorie'] != '' && $_POST['categorie'] != null) {
        $categories = $_POST['categorie'];

        $cat_ids = array();

        foreach ($categories as $value) {
            $cat_ids[] = preg_replace("/[^0-9]/", '', $value);
        }
    } else {
        echo "Bitte geben Sie mindestens eine Kategorie an! / Please choose at least one category";
        echo '<a href="index.php">Zurück zum Formular / back to the form</a><br /><br />';
        $cat_ids = '';

    }


    $db = new dbConnection();
} catch (Exception $e) {
    echo 'The following error occured: ', $e->getMessage(), "\n";
    echo '<a href="index.php">Zurück zum Formular / back to the form</a>';
}

//the id of your listing
$id = '1';

if(!empty($cat_ids)) {
    foreach ($cat_ids as $cat_id) {
        $db->query("INSERT INTO categories_has_listings (category_id, listing_id)
                                VALUES ('$cat_id', '$id')");
    }

    if (mysql_error() != '') {
    echo "An error occured. <br />";
    echo mysql_errno() . ": " . mysql_error() . "\n";
    echo '<a href="index.php">back to the form</a>';
    } else {
        echo 'Listing was added';
        echo '<meta http-equiv="refresh" content="3; URL=index.php">';
    }
}

?>