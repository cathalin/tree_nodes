<?php
/*
 * Copyright (c) 2013 Patric Gutersohn
 * http://www.ladensia.com
 *
 * Licensed under the MIT License
 */
include_once realpath(PATH . '\createAccount\lib') . '\XmlApi.php';

class ServiceClass {

    public function __construct() {

        $host = '108.168.206.108'; //add the IP of your host
        $user = 'muchkind'; //add your cpanel login username
        $password = 'W2qJdqCC2B'; //add your cpanel login password
        $domain = 'muchkin.de'; //add your cpanel domain

        $ssl = 0;
        $this->ssl = $ssl;

        /*
         * TODO - Test for Connection
         */
        $cpanelApi = new XmlApi($host, $user, $password);

        $this->cpanelApi = $cpanelApi;
        $this->whmApi = $cpanelApi;
        $this->password = $password;
        $this->domain = $domain;

        if($this->ssl == '0') {
            $port = '2082';
            $proto = 'http';

            $port_whm = '2086';

            $this->cpanelApi->set_port($port);
            $this->cpanelApi->set_protocol($proto);

            $this->whmApi->set_port($port_whm);
            $this->whmApi->set_protocol($proto);

        } else if($this->ssl == '1') {
            $port = '2083';
            $proto = 'https';

            $port_whm = '2087';

            $this->cpanelApi->set_port($port);
            $this->cpanelApi->set_protocol($proto);

            $this->whmApi->set_port($port_whm);
            $this->whmApi->set_protocol($proto);
        }

    }

    public function addAccount($user, $domain, $password, $contactemail, $webspace, $ftp, $mysql, $email, $subdomain, $addon, $bandwith) {
        //Parameter for the cPanel Api Function createacct for more details go to http://docs.cpanel.net/twiki/bin/view/SoftwareDevelopmentKit/CreateAccount
        /*
        $domain = '';
        */

        //optional parameters
        /*
        $plan = 'Reseller_Plan';
        $password = '';
        $quota = 500;
        $contactemail = 'email';
        $maxftp = 20;
        $maxsql = 10;
        $maxpop = 10;
        $maxlst = 10;
        $maxsub = 10;
        $maxpark = 10;
        $maxaddon = 10;
        $bwlimit = 10000;
        $reseller = 0;
        */

        $cpmod = 'x3';
        $language = 'english-utf-8'; //set the language example:spanish-utf8
        $pkgname = 'muchkind_small';
        $savepkg = 0;

        //$user, $domain, $password, $contactemail, $webspace, $ftp, $mysql, $subdomain, $addon, $bandwith
        //username=myuser&plan=basic &ip=n&cpmod=x3&password=h@rd2gu3ss!p@ss&contact email=username @domain.tld&domain=domain.tld&useregns=0
        $xml = $this->cpanelApi->createacct(array('username' => $user, 'domain' => $domain, 'password' => $password, 'contactemail' => $contactemail, 'quota' => $webspace, 'ftp' => $ftp, 'mysql' => $mysql, 'subdomain' => $subdomain, 'addon' => $addon, 'email' => $email, 'bandwith' => $bandwith, 'plan' => $pkgname, 'savepkg' => $savepkg));

        if($xml->result->statusmsg) {
            $return = $xml->result->statusmsg;
        }

        return $return;
    }

    public function listPackages() {
        return $this->cpanelApi->listpkgs();
    }

}
