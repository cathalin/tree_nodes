<?php
/*
 * Copyright (c) 2013 Patric Gutersohn
 * http://www.ladensia.com
 *
 * Licensed under the MIT License
 */
define("PATH", $_SERVER['DOCUMENT_ROOT']);

$path = realpath(PATH . '\createAccount\lib');
include_once $path . '\ServiceClass.php';

    if(!empty($_REQUEST['username'])) {
        $service = new ServiceClass();

        $msg = $service->addAccount($_REQUEST['username'], $_REQUEST['domain'], $_REQUEST['password'], $_REQUEST['contactemail'], $_REQUEST['webspace'],
            $_REQUEST['ftp'], $_REQUEST['mysql'],  $_REQUEST['email'], $_REQUEST['subdomain'],  $_REQUEST['addon'],  $_REQUEST['bandwith']);

        echo $msg;

    }


?>