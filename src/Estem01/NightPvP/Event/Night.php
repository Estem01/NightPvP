<?php 

namespace Estem01\NightPvP\Event;

use Estem01\NightPvP\Main;
use Estem01\NightPvP\EventListener;

class Night {

  public isNight $night;
    
    public function isNight(int $t, $night): bool{    
        if($t >= 13000 && $t < 18000){
          return true;
        }else{
          return false;
        }
    }
}    
