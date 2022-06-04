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
    private static Bip $bip;

    private Driver $driver;
    private Config $config;

    /**
     * @return Bip
     */
    public static function getBip(): Bip
    {
        return self::$bip;
    }

    private function __construct(){}
    public static function setup(Driver $driver,Config $config){
        if(self::$bip == null)
            self::$bip = new Bip();

        self::getBip()->driver = $driver;
        self::getBip()->config = $config;

    }

}