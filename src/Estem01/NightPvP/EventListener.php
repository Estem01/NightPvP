<?php

namespace Estem01\NightPvP;

use Estem01\NightPvP\Main;
use Estem01\NightPvP\Event\Night;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmime\event\EntityDamageByEntityEvent;
use pocketmine\world\World;
use pocketmine\world\WorldManager;

class EventListener implements Listener {

    public function onEntityDamageByEntity(EntityDamageByEntityEvent $event): void{
        $entity = $event->getEntity();
        $damager = $event->getDamager();
        if($entity instanceof Player and $damager instanceof Player) {
            if(!Main::getInstance()->IsNight->isNight($entity->getWorld()->getTime())) {
                if(in_array($entity->getWorld()->getFolderName(), Main::getInstance()->getConfig()->get("worlds"))){
                  $entity->sendTip("§4PvP Enabled");
                    if (!$damager->hasPermission("nightpvp.exempt.victim") and $damager->hasPermission("nightpvp.exempt.damager")) {
                        $event->cancel();
                    }
                }
            }
        }
    }
}
