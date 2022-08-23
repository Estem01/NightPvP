<?php

declare(strict_types=1);

namespace Estem01\NightPvP;

use Estem01\NightPvP\Event\Night;
use Estem01\NightPvP\EventListener;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\world\World;
use pockemine\world\WorldManager;

class Loader extends PluginBase implements Listener{

  private static Main $instance;
    public Config $config;	

    public function onEnable() : void
    
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->getServer()->getPluginManager()->registerEvents(new Night($this), $this);
        $this->saveResource("config.yml");
        $this->config = new Config($this->getDataFolder() . "config.yml");
    }

 public function onLoad() : void {
        self::$instance = $this;
    }
	
    public static function getInstance() : Main {
        return self::$instance;
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
    
    public function isNight(int $t) : bool
    {
        if ($t >= 13000 && $t < 18000) {
            return true;
        }
        return false;
    }
}
