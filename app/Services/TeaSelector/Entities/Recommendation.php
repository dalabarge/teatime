<?php

namespace App\Services\TeaSelector\Entities;

use Jenssegers\Model\Model;

class Recommendation extends Model
{
    protected $appends = [
        'time_to_brew',
        'display_type',
    ];

    public function __construct($attributes = [])
    {
        if ($attributes instanceof self) {
            $attributes = $attributes->toArray();
        }

        parent::__construct($attributes);
    }

    public function getTimeToBrewAttribute()
    {
        $minutes = str_pad(floor($this->time / 60), 2, '0', STR_PAD_LEFT);
        $seconds = str_pad($this->time % 60, 2, '0', STR_PAD_LEFT);

        return $minutes.':'.$seconds;
    }

    public function getDisplayTypeAttribute()
    {
        return ucfirst($this->type);
    }
}
