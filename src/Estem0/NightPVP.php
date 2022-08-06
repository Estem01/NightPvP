<?php

declare(strict_types=1);

namespace Estem0;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class NightPVP extends PluginBase implements Listener{
    
    private Config($config);

    public function onEnable() : void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveResource("config.yml");
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
    }

    public function onEntityDamageByEntity(EntityDamageEvent $event) {
        $entity = $event->getEntity();
        if ($event instanceof EntityDamageByEntityEvent) {
            $damager = $event->getDamager();
            if ($entity instanceof Player && $damager instanceof Player) {
                if (!$this->isNight($entity->getWorld()->getTime())) {
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
