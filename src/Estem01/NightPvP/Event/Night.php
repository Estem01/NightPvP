<?php 

namespace Estem01\NightPvP\Event;

use Estem01\NightPvP\Main;

class Night implements Listener {

    public function isNight(Array $array[0], Array $array[1], String $world, $e): bool{ 
      $time = getTime($array[0], $array[1]); 
      return $time;
    }
}    
