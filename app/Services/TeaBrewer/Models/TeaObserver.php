<?php

namespace App\Services\TeaBrewer\Models;

use App\Services\TeaBrewer\Timer;

class TeaObserver
{
    public function creating(Tea $tea)
    {
        $timer = new Timer($tea->type, $tea->time, $tea->temperature);
        $tea->drinkable_at = $timer->drinkable();
    }
}
