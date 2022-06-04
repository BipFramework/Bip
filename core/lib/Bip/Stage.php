<?php


namespace lib\Bip;


abstract class Stage
{
    protected function init(){
        throw new \Exception('You must override init() method');
    }

}