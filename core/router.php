<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/lib/autoload.php';

use lib\Route\Route;


/*
* You can use regex pattern in routes
* Http Queries are not route
* The CaseInsensitive is enabled
* -----------------------------------
* Magic routes starts with @ 
* list of magic routes = [@NOT_FOUND]
*
*/


#Webhook Route
Route::route('/webhook/?([^/]*)/?','init/init.php');

#Root Route
Route::route('/','view/web/index.php');

#Install Route
Route::route('/install','view/install/install.php');


#Help Route
Route::route('/help',function (){
     echo 'need help ? <a href="https://github.com/sepsoh/bip"> click here ! </a>';
});

Route::route('@NOT_FOUND','view/errorPages/notFound.php');

Route::routeFlush();