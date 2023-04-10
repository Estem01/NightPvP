<?php

namespace Estem01\NightPvP;

use Estem01\NightPvP\Events\NightEvent;

use pocketmine\utils\Config;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

    private Config $config;

    public function onEnable(): void {
        $this->saveDefaultConfig();
        
        $this->config = new Config($this->getDataFolder() . "config.yml");
        $this->getServer()->getPluginManager()->registerEvents(new NightEvent($this), $this);
    }

    public function getConfig() : Config {
        return $this->config;
    }
}