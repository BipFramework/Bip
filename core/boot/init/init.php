<?php
use Bip\BipRoute;
if(isset(BipRoute::$routeMatches[1]) && !empty(BipRoute::$routeMatches[1])){
    if(is_file('../bots/'.BipRoute::$routeMatches[1].'/main.php')){
        chdir('../bots/'.BipRoute::$routeMatches[1]);
        require('main.php');
    }else
        require(__DIR__.'/view/projectNotFound.php');

}else
    require(__DIR__.'/view/webhookHelp.php');
