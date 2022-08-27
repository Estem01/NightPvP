<?php

declare(strict_types=1);

namespace Estem01\NigtPvP\utils;

use pocketmine\player\Player;

use pocketmine\network\mcpe\protocol\PlaySoundPacket;

class Utils {

    public static function playSound(Player $player, string $soundName, float $volume = 1, float $pitch = 1) {
        $pk = new PlaySoundPacket();
        $pk->x = $player->getPosition()->getX();
        $pk->x = $player->getPosition()->getY();
        $pk->x = $player->getPosition()->getZ();
        $pk->soundName = $soundName;
        $pk->volume = $volume;
        $pk->pitch = $pitch;
        $player->getNetworkSession()->sendDataPacket($pk);
    }
}
