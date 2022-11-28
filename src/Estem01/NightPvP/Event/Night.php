<?php 

namespace Estem01\NightPvP\Event;

use Estem01\NightPvP\Main;

class Night implements Listener {

    public function isNight(int $t, $e): bool{ 
        if($t >= 13000 && $t < 18000){
          return true;
          }else{
          $e->cancel;
        }
    }
}    
