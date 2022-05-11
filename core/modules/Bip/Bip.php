<?php
namespace Bip;

class Bip{
    /**
     * array of current route matches
     * @var array
     */
    public static $routeMatches;    

    /**
     * route : main router of bip
     *
     * @param  string $route regex patten do not use ^$
     * @param  mixed $call callable function or string path without __DIR__
     * @return bool returns true if success
     */
    public static function route(string $route , $call): bool
    {
        
        //when bip isn`t in root path of public_html root route '/' isn`t working , this code replaces */bip/ with /
        $path = \preg_replace('#^.*/bip/#','/',$_SERVER['REDIRECT_URL']);
        
        if(\preg_match('#^('.$route.')$#',$path,$routeMatches)===1){
            if(\is_callable($call))
                $call();
            elseif(\is_file($call))
                require_once($call);
            else
                throw new Exception("File : $call not found"); 

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
