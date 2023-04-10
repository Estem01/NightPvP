<?php

namespace Estem01\NightPvP\Events;

use Estem01\NightPvP\Main;
use pocketmine\utils\Config;

use pocketmine\world\World;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;

class NightEvent implements Listener {

    private Main $main;
    private Config $config;

    public function __construct(Main $main) {
        $this->main = $main;
        $this->config = $main->getConfig();
    }

    public function onBreak(BlockBreakEvent $event) {
        $player = $event->getPlayer();
        $world = $player->getWorld()->getFolderName();
        $time = $player->getWorld()->getTimeOfDay();
        $allowedWorlds = $this->config->get("allowed-worlds", []);

        if($player instanceof Player && $time >= World::TIME_FULL_NIGHT && $time <= World::TIME_FULL_DAY && in_array($world, $allowedWorlds)) {
            $event->cancel();

            if($this->config->get("error-message-type") == "popup") {
                $player->sendPopup($this->config->get("error-no-pvp"));
            } else {
                $player->sendMessage($this->config->get("error-no-pvp"));
            }
        }
    }
}