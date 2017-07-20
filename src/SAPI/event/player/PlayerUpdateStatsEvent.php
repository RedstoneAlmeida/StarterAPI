<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 20/07/2017
 * Time: 18:07
 */

namespace SAPI\event\player;


use pocketmine\Player;
use SAPI\event\EventAPI;
use SAPI\jsonSystem\Json;

class PlayerUpdateStatsEvent extends EventAPI
{
    protected $stats;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    /**
     * @param $stats
     */
    public function setStats($stats){
        $this->stats = $stats;
    }

    public function getStats(){
        return $this->stats;
    }

}