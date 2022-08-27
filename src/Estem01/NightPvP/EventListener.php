<?php

namespace Estem01\NightPvP;

use Estem01\NightPvP\Main;
use Estem01\NightPvP\Event\Night;
use Estem01\NightPvP\Utils\Utils;

use pocketmine\player\Player;
use pocketmine\utils\Config;

use pocketmine\event\Listener;
use pocketmime\event\Entity\DamageByEntityEvent;

class EventListener implements Listener {

    public function onDamageEntity(EntityDamageByEntityEvent $event): void{
        $entity = $event->getEntity();
        $damager = $event->getDamager();
        if($entity instanceof Player and $damager instanceof Player) {
            if(!Main::getInstance()->IsNight->isNight($entity->getWorld()->getTime())){
                if(in_array($entity->getWorld()->getFolderName(), Main::getInstance()->config->get("worlds"))){
                  $entity->sendTip("§4PvP Enabled");
                    Utils::playSound($entity, "random.pop2", 1, 1);
                    if (!$damager->hasPermission("nightpvp.exempt.victim") and $damager->hasPermission("nightpvp.exempt.damager")) {
                        $event->cancel();
                    }
                }
            }
        }
    }
}
