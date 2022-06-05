<?php


namespace lib\Bip;

use lib\Exception\BipException;

abstract class Stage
{
    protected function init(){
        throw new BipException('You must override init() method');
    }

}