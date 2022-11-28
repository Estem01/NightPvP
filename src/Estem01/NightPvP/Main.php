<?php

declare(strict_types=1);

namespace Estem01\NightPvP;

use Estem01\NightPvP\Event\Night;
use Estem01\NightPVP\Ultils\Ultilities;
use Estem01\NightPvP\EventListener;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase{

    public static Main $instance;
    public Config $config;
    public $isNight;

    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->getServer()->getPluginManager()->registerEvents(new Utilities ($this), $this);
        $this->getServer()->getPluginManager()->registerEvents(new Night($this), $this);
        $this->saveResource("config.yml");
        $this->$config = new Config($this->getDataFolder() . "config.yml");
	$this->$isNight = new Night($this);
    }

    public function onLoad(): void{
        self::$instance = $this;
    }
	
    public static function getInstance(): Main{
        return self::$instance;
    }
}
