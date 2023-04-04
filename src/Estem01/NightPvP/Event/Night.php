<?php 

namespace Estem01\NightPvP\Event;

use Estem01\NightPvP\Main;

class Night implements Listener {

    public function isNight(): bool{ 

    $time = $this->getTimeOfDay();

	if($time >= World::TIME_NIGHT && $time < World::TIME_SUNRISE){    
        return true;       
    }else{   
        return false;
        $event->cancel;
		
	}
    }
}    
