<?php
// src/Estem01/NightPvP/Events/NightEvent.php
namespace Estem01\NightPvP\Events;

use Estem01\NightPvP\Main;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player\Player;
use pocketmine\world\World;

class NightEvent implements Listener {
    private Main $main;
    private array $config;

    public function __construct(Main $main) {
        $this->main = $main;
        $this->config = $main->getPluginConfig()->getAll();
    }

    public function onPVP(EntityDamageByEntityEvent $event): void {
        $damager = $event->getDamager();
        $target = $event->getEntity();

        // Ensure both are players
        if (!$damager instanceof Player || !$target instanceof Player) return;

        $world = $damager->getWorld();
        $worldName = $world->getFolderName();
        $worldTime = $world->getTimeOfDay();

        // Check allowed worlds
        $allowedWorlds = $this->config['allowed-worlds'] ?? ['world'];
        if (!in_array($worldName, $allowedWorlds)) return;

        // Time settings
        $nightStart = $this->config['night-start-time'] ?? World::TIME_NIGHT;
        $nightEnd = $this->config['night-end-time'] ?? World::TIME_SUNRISE;
        $timeCheckEnabled = $this->config['enable-world-time-check'] ?? true;

        // PvP time restriction
        if ($timeCheckEnabled && 
            ($worldTime >= $nightEnd && $worldTime < $nightStart) && 
            !$damager->hasPermission("nightpvp.bypass")) {
            
            $event->cancel();
            
            // Send message
            $messageType = $this->config['error-message-type'] ?? 'popup';
            $message = $this->config['day-no-pvp'] ?? '§cPvP is only allowed during the night!';

            if ($messageType === 'popup') {
                $damager->sendPopup($message);
            } else {
                $damager->sendMessage($message);
            }

            // Optional logging if enabled
            if ($this->config['enable-logger'] ?? false) {
                $this->main->getLogger()->info("PvP blocked for {$damager->getName()} in world {$worldName}");
            }
        }
    }
}
