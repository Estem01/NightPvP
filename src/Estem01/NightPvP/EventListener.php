<?php

namespace Estem01\NightPvP;

use Estem01\NightPvP\Main;
use Estem01\NightPvP\Event\Night;
use Estem01\NightPvP\Utils\Utils;

use pocketmine\server\Server;
use pocketmine\player\Player;
use pocketmine\utils\Config;

use pocketmine\event\Listener;
use pocketmime\event\entity\DamageByEntityEvent;

class EventListener implements Listener {

         $entity = $event->getEntity();
    public function onDamageEntity(EntityDamageByEntityEvent $event): void{
        if($entity instanceof Player && $damager instanceof Player) {
            if(!Main::getInstance()->isNight->isNight($entity->getWorld()->getTime())){
                if(in_array($entity->getWorld()->getFolderName(), Main::getInstance()->config->get("worlds"))){
                  $player->sendTip("§4PvP Enabled");
                    Utils::playSound($entity, "random.pop2", 1, 1);
                    if (!$damager->hasPermission("nightpvp.exempt.victim") and $damager->hasPermission("nightpvp.exempt.damager")) {
                        $event->cancel();
                    }
                }
            }
        }
    }
}
