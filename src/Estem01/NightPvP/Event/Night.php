<?php 

namespace Estem01\NightPvP\Event;

use Estem01\NightPvP\Main;
use Estem01\NightPvP\EventListener;

class Night implements Listener {

    public function isNight(int $t): bool{ 
        if($t >= 13000 && $t < 18000){
          return true;
          }eles{
          $event->cancel;
        }
    }
}    
