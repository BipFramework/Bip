<?php
namespace lib\Config;

use lib\Exception\BipException;
use stdClass;

class Config
{
    private object $config;
    private string $configPath;

    /**
     * @throws BipException
     */
    public function __construct(string $configPath = null)
    {
        if($configPath != null) {
            if (is_file($configPath))
                $this->config = json_decode(file_get_contents($configPath));
            else
                throw new BipException("$configPath config file dose not exist");

            $this->configPath = $configPath;
        }else{
            $this->configPath = 'config.json'; //for write() method
            $this->config     = new stdClass();
        }
    }

    /**
     * @throws BipException
     */
    public function get(string $key):mixed{

        if(isset($this->config->{$key}))
            return $this->config->{$key};
        else
            throw new BipException("[$key] key not found in Config instance , you can add it to [$this->configPath] file or call set('$key','YOR_VALUE') method on Config instance for inline configuration");

    }
    public function set(string $key , string $value): void
    {
        $this->config->{$key} = $value;
    }

    public function write(): void
    {
        file_put_contents($this->configPath,json_encode($this->config,JSON_PRETTY_PRINT));
    }



}