<?php
namespace lib\Driver\Telegram;

class Telegram{
    private static $telegram ;
    private function __construct(){}
    static function create(){
        if(NULL == self::$telegram)
            self::$telegram == new Telegram();
        return self::$telegram;
    }
    
}

