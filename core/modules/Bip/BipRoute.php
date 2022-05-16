<?php
/******************************** 
* More on Github :
* https://github.com/sepsoh/bip
*
********************************/
namespace Bip;

class BipRoute{
    
    /**
     * array of current route matches [first array member is full match]
     * @var array
     */
    public static $routeMatches;

    /**
     * array of routes
     * @var array
     */
    public static $routes;

    /**
     * route : main router of bip
     *
     * @param  string $route regex patten do not use ^$
     * @param  mixed $call callable function or string path without __DIR__
     */
    public static function route(string $route , $call)
    {
      self::$routes[] = [$route,$call];
    }
    public static function routeFlush() :void
    {
        $isRouted = false;
        foreach(self::$routes as $rou){
            //when bip isn`t in root path of public_html root route '/' isn`t working , this code replaces */bip/ with /
            $path = \preg_replace('#^.*/bip/#','/',$_SERVER['REDIRECT_URL']);

            if($rou[0][0] != '@' && \preg_match('#^'.$rou[0].'$#i',$path,self::$routeMatches)===1){
              if(\is_callable($rou[1]))
                  $rou[1]();
              elseif(\is_file($rou[1]))
                  require_once($rou[1]);
              else
                  throw new Exception("File : $rou[1] not found"); 
  
              $isRouted=true;
          }
        }// magic routes
        foreach(self::$routes as $rou){
            if($rou[0][0] == '@'){
                if(!$isRouted && $rou[0]=='@NOT_FOUND')
                    if(\is_callable($rou[1]))
                        $rou[1]();
                    elseif(\is_file($rou[1]))
                        require_once($rou[1]);
                    else
                        throw new Exception("File : $rou[1] not found"); 
            }
            

        }

        

    }
}
