<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 20/07/2017
 * Time: 19:22
 */

namespace SAPI;

use pocketmine\Server;
use SAPI\config\Config;
use SAPI\event\player\PlayerUpdateStatsEvent;
use pocketmine\Player;

class customEvents
{

    public function playerStatsEvent(){
        $config = new Config("stats", 2, API::STATS_PATH);
        $cfg = $config->getConfig("stats", true);
        foreach(Server::getInstance()->getOnlinePlayers() as $player){
            if(!$cfg->exists($player->getName())) {
                Server::getInstance()->getPluginManager()->callEvent($ev = new PlayerUpdateStatsEvent($player));
                if($ev->getStats() == "" or $ev->getStats() == null){
                    $ev->setStats(["Wins" => 0, "Kills" => 0]);
                }
                $cfg->set($player, $ev->getStats());
                $cfg->save();
            }
        }
    }

}