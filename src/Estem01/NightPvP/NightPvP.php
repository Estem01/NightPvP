<?php

declare(strict_types=1);

namespace Estem0\NightPvP;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class NightPvP extends PluginBase implements Listener{

    public function onEnable() : void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
    }

    public function onEntityDamageByEntity(EntityDamageByEntityEvent $event) : void
    {
        $entity = $event->getEntity();
        $damager = $event->getDamager();
        if ($entity instanceof Player && $damager instanceof Player) {
            if (!$this->isNight($entity->getWorld()->getTime())) {
                if (in_array($entity->getWorld()->getFolderName(), $this->getConfig()->get('worlds', []))) {
                    if (!$damager->hasPermission("nightpvp.exempt.victim") && $damager->hasPermission("nightpvp.exempt.damager")) {
                        $event->cancel();
                    }
                }
            }
        }
    }
    
    public function isNight($t) {
        return ($t >= 10900 && $t < 17800);
    }
}
