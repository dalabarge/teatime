<?php

namespace App\Models\Observers;

use App\BrewTimer;
use App\Models\Tea;

class TeaObserver
{
    public function creating(Tea $tea)
    {
        $timer = new BrewTimer($tea->type, $tea->time, $tea->temperature);
        $tea->drinkable_at = $timer->drinkable();
    }
}
