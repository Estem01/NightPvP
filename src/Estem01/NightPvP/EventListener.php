<?php

namespace Estem01\NightPvP;

use Estem01\NightPvP\Loader;
use Estem0\NightPvP\Event\Night;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmime\event\EntityDamageByEntityEvent;
use pocketmine\world\World;
use pocketmine\world\WorldManager;

class EventListener implements Listener {

    public function __construct(private Main $main) {
        $this->main = $main;
    }

public function onEntityDamageByEntity(EntityDamageByEntityEvent $event) : void

    {

        $entity = $event->getEntity();

        $damager = $event->getDamager();

        if ($entity instanceof Player and $damager instanceof Player) {

            if (!$this->isNight($entity->getWorld()->getTime())) {

                if (in_array($entity->getWorld()->getFolderName(), $this->getConfig()->get("worlds"))) {

                  $this->$event->getPlayer()->sendTip("§4PvP Enabled");

                    if (!$damager->hasPermission("nightpvp.exempt.victim") and $damager->hasPermission("nightpvp.exempt.damager")) {

                        $event->cancel();
                  }
              }
          }
       }
    }

 public function getMain() : Main {
        return $this->main;
    }
}
