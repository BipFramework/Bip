<?php


namespace lib\Config;

use Exception;
use function file_get_contents;
use function json_decode;

class ConfigReader
{

    private const JSON = 0;
    //private const XML = 1;

    /**
     * 0 -> json
     * 1 -> xml
     * 2 -> ...
     * @var int
     */
    private int $configType;
    public object $config;
    private string $configPath;
    /**
     * @throws Exception
     */
    public function __construct(String $configPath)
    {
        $this->configPath = $configPath;


        // you must check here what is config type
        $this->configType = ConfigReader::JSON;
        // zero is set to test it


        if(is_file($configPath) && $this->configType == ConfigReader::JSON)
            $this->config = json_decode(file_get_contents($configPath));
        else
            throw new Exception('Config file dose not exist');
    }

    /**
     * @return String
     */
    public function getConfigPath(): string
    {
        return $this->configPath;
    }
    public function writeConfig(): void
    {
        if($this->configType == ConfigReader::JSON){
            file_put_contents($this->configPath,json_encode($this->config,JSON_PRETTY_PRINT));
        }

    }


}