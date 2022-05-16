<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/modules/Bip/BipRoute.php';

use Bip\BipRoute;


/*
* You can use regex pattern in routes
* Queries are not route
* The CaseInsensitive is enabled
*/


#Webhook Route
BipRoute::route('/webhook/?([^/]*)/?','init/init.php');

#Root Route
BipRoute::route('/','view/index.php');

#Install Route
BipRoute::route('/install','view/install/install.php');


#Help Route
BipRoute::route('/help',function (){
     echo 'need help ? <a href="https://github.com/sepsoh/bip"> click here ! </a>';
});


BipRoute::routeFlush();