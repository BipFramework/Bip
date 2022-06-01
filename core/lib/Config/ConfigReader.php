<?php


namespace lib\Config;


class ConfigReader
{
    /**
     * 0 -> json
     * 1 -> xml
     * 2 -> php
     * @var int
     */
    private int $configType;
    private object $config;

    /**
     * @throws Exception
     */
    public function __construct(String $configPath)
    {
        // you must check what is config type
        $this->configType = 0;
        if(is_file($configPath) && $this->configType == 0)
            $this->config = json_decode(file_get_contents($configPath));
        else
            throw new \Exception('Config file dose not exist');
    }
    public function getConfig(){
        return $this->config;
    }


}