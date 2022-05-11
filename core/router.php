<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


require __DIR__ . '/modules/Bip/Bip.php';
use Bip\Bip;

Bip::route('/',function(){
    echo 'It`s work ! Bip is running ...';
});
Bip::route('/webhook',__DIR__.'/boot/init/init.php');

Bip::route('/web.+',function (){
     echo 'hi from console';
 });

 