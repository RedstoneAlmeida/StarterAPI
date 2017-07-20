<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 20/07/2017
 * Time: 17:33
 */

namespace SAPI\config;

use pocketmine\Server;
use pocketmine\utils\Config as Configuration;

class Config
{

    // Disponible Types
    /* default $type = 1
    $type = 1; YAML/.yml
    $type = 2; JSON/.json
    */

    public function __construct(String $name, int $type = 1, String $path = null)
    {
        $cfg = new Configuration(\pocketmine\PLUGIN_PATH . "BaseAPI" . DIRECTORY_SEPARATOR, "configs.yml", Configuration::YAML);
        if($path == null) $path = \pocketmine\PLUGIN_PATH . "BaseAPI" . DIRECTORY_SEPARATOR . "files" . DIRECTORY_SEPARATOR;
        @mkdir($path);
        if(!file_exists($path . $name)){
            $typed = self::typed($type);
            new Configuration($path, $name . $typed, self::types($type));
            $cfg->set($name, ["path" => $path, "type" => $type]);
            $cfg->save();
        }
    }

    public static function types($type){
        switch($type){
            case 1:
                return Configuration::YAML;
                break;
            case 2:
                return Configuration::JSON;
                break;
            default:
                return Configuration::YAML;
        }
    }

    public static function typed($type){
        switch($type){
            case 1:
                return ".yml";
                break;
            case 2:
                return ".json";
                break;
            default:
                return ".yml";
        }
    }

    public function getConfig(String $configName, bool $callSave = false){
        $configuration = new Configuration(\pocketmine\PLUGIN_PATH . "BaseAPI" . DIRECTORY_SEPARATOR, "configs.yml", Configuration::YAML);
        if(!$configuration->exists($configName)){ Server::getInstance()->getLogger()->critical("Config not exists!"); return false; }
        $all = $configuration->get($configName);
        if($callSave != false) {
            $a = new Configuration($all["path"], $configName . self::typed($all["type"]), self::types($all["type"])); $a->save();
        }
        return new Configuration($all["path"], $configName . self::typed($all["type"]), self::types($all["type"]));
    }

}