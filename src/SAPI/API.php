<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 20/07/2017
 * Time: 18:03
 */

namespace SAPI;

use pocketmine\Server;

class API
{

    const STATS_PATH = \pocketmine\PLUGIN_PATH . "BaseAPI" . DIRECTORY_SEPARATOR . "stats" . DIRECTORY_SEPARATOR;

    public function customEvents(bool $useCustomEvents = false){
        if($useCustomEvents != false){

        }
    }

}