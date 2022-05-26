<?php
use lib\Route\Route;

if(isset(Route::$routeMatches[1]) && !empty(Route::$routeMatches[1])){
    if(is_file('../bots/'.Route::$routeMatches[1].'/main.php')){
        chdir('../bots/'.Route::$routeMatches[1]);
        require('main.php');
    }else
        require(__DIR__.'/../view/init/projectNotFound.php');

}else
    require(__DIR__.'/../view/init/webhookHelp.php');
