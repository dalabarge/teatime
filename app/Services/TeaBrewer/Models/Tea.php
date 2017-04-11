<?php

namespace App\Services\TeaBrewer\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use OutOfBoundException;

class Tea extends Model
{
    protected $table = 'teas';

    protected $appends = [
        'is_ready',
        'time_left_brewing',
        'display_type',
    ];

    protected $dates = [
        'drinkable_at',
    ];

    protected $fillable = [
        'name',
        'type',
        'temperature',
        'time',
        'caffeine',
    ];

    const TYPES = [
        'black',
        'green',
        'herbal',
    ];

    public static function boot()
    {
        parent::boot();

        static::observe(TeaObserver::class);
    }

    public function setTypeAttribute($value)
    {
        if ( ! in_array($value, self::TYPES)) {
            throw new InvalidArgumentException('Type '.$value.' is not a valid tea type.');
        }

        array_set($this->attributes, 'type', $value);
    }

    public function setTemperatureAttribute($value)
    {
        if ($value < 0) {
            throw new OutOfBoundException('Temperature '.$temperature.' is too cold. Temperature must not be colder than 0 degrees.');
        }
        if ($value > 212) {
            throw new OutOfBoundException('Temperature '.$temperature.' is too hot. Temperature must not be hotter than 212 degrees.');
        }

        array_set($this->attributes, 'temperature', $value);
    }

    public function setTimeAttribute($value)
    {
        if ($value < 0) {
            throw new OutOfBoundException('Time should be greater than 0 seconds.');
        }

        array_set($this->attributes, 'time', $value);
    }

    public function setCaffeineAttribute($value)
    {
        if ($value < 0) {
            throw new OutOfBoundException('Caffeine content must be a positive number.');
        }

        array_set($this->attributes, 'caffeine', $value);
    }

    public function getTimeLeftBrewingAttribute($value)
    {
        $time = max(0, $this->drinkable_at->subSeconds(time())->timestamp);
        $minutes = str_pad(floor($time / 60), 2, '0', STR_PAD_LEFT);
        $seconds = str_pad($time % 60, 2, '0', STR_PAD_LEFT);

        return $minutes.':'.$seconds;
    }

    public function getIsReadyAttribute()
    {
        return $this->drinkable_at < Carbon::now();
    }

    public function getDisplayTypeAttribute()
    {
        return ucfirst($this->type);
    }

    public function scopeKeyword($query, $keyword)
    {
        $keyword = preg_replace('/[\s]+/', '%', $keyword);
        $query->where(function ($query) use ($keyword) {
            foreach (['name'] as $attribute) {
                $query->orWhere($attribute, 'LIKE', '%'.$keyword.'%');
            }
        });
    }

    public function scopeOfType($query, $type)
    {
        return $query->whereType($type);
    }
}
