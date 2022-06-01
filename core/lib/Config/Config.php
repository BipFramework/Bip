<?php
namespace lib\Config;

class Config
{
    private object $config;
    /**
     * save path of config file for exceptions
     * @var string
     */
    private string $configPath;
    /**
     * @throws \Exception
     */
    public function __construct(string $configPath)
    {
        $this->configPath = $configPath;
        $this->config = (new ConfigReader($configPath))->getConfig();
    }

    /**
     * @throws \Exception
     */
    public function getByKey(string $key){

        if(isset($this->config->{$key}))
            return $this->config->{$key};
        else
            throw new \Exception("[$key] key not found in file ".$this->configPath.' , please read lin\Config manual ');

    }
}