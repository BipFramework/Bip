<?php
/*
* More on Github :
* https://github.com/sepsoh/bip
*
*/
namespace lib\Bip;

use lib\Config\Config;
use lib\Driver\Driver;

class Bip{
    // type of $bip is Bip , when you declare its type you cant use it before initialization
    private static $bip ;
    private Driver $driver;
    private Config $config;

    /**
     * @return Config
     * @throws \Exception
     */
    public static function getConfig(): Config
    {
        return self::getBip()->config;
    }

    /**
     * @return Bip
     * @throws \Exception
     */
    public static function getBip(): Bip
    {
        if (self::$bip == null)
            throw new \Exception('Bip::setup is not called');
        else
            return self::$bip;
    }

    private function __construct(){}
    public static function setup(Driver $driver,Config $config){
        if(self::$bip == null) {
            self::$bip = new Bip();
            self::$bip->driver = $driver;
            self::$bip->config = $config;
        }
    }

}