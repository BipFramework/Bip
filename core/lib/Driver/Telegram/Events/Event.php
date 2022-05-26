<?php
namespace lib\Driver\Telegram\Event;

class Event{
    public static $telegram ;
    private function __construct(){}
    static function create(){
        if(NULL == self::$telegram)
            self::$telegram == new Telegram();
    }
    
}

