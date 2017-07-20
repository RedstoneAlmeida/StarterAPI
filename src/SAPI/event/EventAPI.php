<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 20/07/2017
 * Time: 18:06
 */

namespace SAPI\event;


use pocketmine\event\Event;

class EventAPI extends Event
{

    /** @var \pocketmine\Player */
    protected $player;

    public function getPlayer(){
        return $this->player;
    }

}