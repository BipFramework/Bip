<?php
namespace Bip;

class Bip{
    public static function route(string $route , $call): bool
    {
        if(\strtolower(@\explode('/',$_GET['data'])[0]) == \strtolower($route)){

            if(\is_callable($call))
                $call();
            elseif(\is_file(__DIR__ . '/' . $call))
                require_once(__DIR__ . '/' . $call);

            return true;
        }else
            return false;
    }

    public static function OLDDD(){
        if(!isset($argv[0])){
            $_queryArray = explode('/',$_GET['data']);
            $_method     = strtolower($_queryArray[0]);
        
            if($_method == 'webhook')
            require('boot/init/init.php');
            elseif($_method == 'install')
            require('boot/install/install.php');
            else
            require('boot/web/index.php');
        
        }else{
            echo "Running With Console\n";
            var_dump($argv[0]);
        }
    }


}
