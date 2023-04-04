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

    public function onDamageEntity(EntityDamageByEntityEvent $event): void {

        $player = getPlayer();
         $entity = getEntity();

        if($entity instanceof Player && $damager instanceof Player) {
            if(!Main::getInstance()->isNight->isNight($entity->getWorld())){
                if(in_array($entity->getWorld()->getFolderName(), Main::getInstance()->config->get("worlds"))){

                  foreach(!in_array(Main::getInstance()->config->get("title"))){
                  $config = Main::getInstance()->config->get("title");
                  $player->sendTitle("$config");
                          }

                    foreach(!$damager->hasPermission("nightpvp.exempt.victim") and $damager->hasPermission("nightpvp.exempt.damager")) {
                        $event->cancel();
                    }
                }
            }
        }
    }
