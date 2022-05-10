<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


var_dump($_GET);
var_dump($_SERVER['REQUEST_URI']);
exit();
require __DIR__ . '/modules/Bip/Bip.php';
use Bip\Bip;

Bip::route('/',function(){
    echo 'Bip is running ...';
});
Bip::route('/webhook',__DIR__.'/boot/init/init.php');
Bip::route('/web',function (){
     echo 'hi from console';
 });

 