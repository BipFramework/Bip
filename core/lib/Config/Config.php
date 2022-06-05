<?php
namespace lib\Config;

use Exception;

class Config
{
    private object $config;
    private string $configPath;

    /**
     * @throws Exception
     */
    public function __construct(string $configPath)
    {
        if(is_file($configPath))
            $this->config = json_decode(file_get_contents($configPath));
        else
            throw new Exception('Config file dose not exist');

        $this->configPath = $configPath;
    }

    /**
     * @throws Exception
     */
    public function get(string $key):mixed{

        if(isset($this->config->{$key}))
            return $this->config->{$key};
        else
            throw new Exception("[$key] key not found in file $this->configPath.' please read lib\Config manual ");

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