<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/modules/Bip/BipRoute.php';

use Bip\BipRoute;


/*
* You can use regex pattern in routes
* Queries are not route
*/

#Root Route
BipRoute::route('/','boot/web/index.php');

#Webhook Route
BipRoute::route('/webhook/?.*','boot/init/init.php');

#Install Route
BipRoute::route('/install','boot/install/install.php');


#Help Route
BipRoute::route('/help',function (){
     echo 'need help ? <a href="https://github.com/sepsoh/bip"> click here ! </a>';
});


BipRoute::routeFlush();