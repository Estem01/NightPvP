<?php 

namespace Estem01\NightPvP\Event;

use Estem01\NightPvP\Loader;
use Estem01\NightPvP\EventListener;

class Night {

  public function __construct(private Main $main) {
        $this->main = $main;
    }
  
  public function isNight(int $t) : bool

    {

        if ($t >= 13000 && $t < 18000) {

            return true;

        }else{
        return false;

    }
    }
 
 public function getMain() : Main {
        return $this->main;
    }
}    

}
