<?php
use Bip\BipRoute;
if(isset(BipRoute::$routeMatches[1])){
    if(is_file('../bots/'.BipRoute::$routeMatches[1].'/main.php')){
        chdir('../bots/'.BipRoute::$routeMatches[1]);
        require('../bots/'.BipRoute::$routeMatches[1].'/main.php');
    }else
        throw new Exception('main file not found bots/'.BipRoute::$routeMatches[1].'/main.php');

}else{
    throw new Exception('enter project name after webhook/[project name]');
}
