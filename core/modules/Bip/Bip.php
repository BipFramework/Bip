<?php
namespace Bip;

class Bip{
    public static function route(string $route , $call): bool
    {
        
        //when bip isn`t in root path of public_html root route '/' isn`t working , this code replaces */bip/ with /
        $path = \preg_replace('#^.*/bip/#','/',$_SERVER['REDIRECT_URL']);

        $route = $route == '' ? '/' : $route;
        $path = $path == '' ? '/' : $path;

        if(\strtolower($route)==\strtolower($path)){
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
