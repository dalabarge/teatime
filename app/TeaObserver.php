<?php

namespace App;

use App\Tea;
use App\BrewTimer;

class TeaObserver
{
    public function creating(Tea $tea)
    {
        $timer = new BrewTimer($tea->type, $tea->time, $tea->temperature);
        $tea->drinkable_at = $timer->drinkable();
    }
}
