<?php
namespace lib\Config;

use Exception;

class Config
{
    private ConfigReader $configReader;

    public function __construct(string $configPath)
    {
        $this->configReader = new ConfigReader($configPath);
    }

    /**
     * @throws Exception
     */
    public function get(string $key):mixed{

        if(isset($this->configReader->config->{$key}))
            return $this->configReader->config->{$key};
        else
            throw new Exception("[$key] key not found in file ".$this->configReader->getConfigPath().' please read lin\Config manual ');

    }
    public function set(string $key , string $value): void
    {
        $this->configReader->config->{$key} = $value;
    }
    public function write(): void {
        $this->configReader->writeConfig();
    }

}