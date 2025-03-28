<?php
// src/Estem01/NightPvP/Main.php
namespace Estem01\NightPvP;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use Estem01\NightPvP\Events\NightEvent;

class Main extends PluginBase {
    private Config $config;

    public function onEnable(): void {
        // Save default config
        $this->saveDefaultConfig();
        $this->config = $this->getConfig();

        // Register events
        $this->getServer()->getPluginManager()->registerEvents(new NightEvent($this), $this);
    }

    public function getPluginConfig(): Config {
        return $this->config;
    }
}
