<?php

namespace App\Models\Collections;

use App\Models\Recommendation;
use App\Traits\CollectionCoercion;
use Illuminate\Support\Collection;

class Recommendations extends Collection
{
    use CollectionCoercion;

    protected $object = Recommendation::class;

    public function type($type)
    {
        return $this->where('type', $type);
    }

    public function maxCaffeine($caffeine)
    {
        return $this->where('caffeine', '<=', $caffeine);
    }

    public function optimalBrewTime($time)
    {
        // @todo reduce by time
        return new static($this->items);
    }

    public function optimalChoice($options)
    {
        if( array_has($options, 'type') ) {
            $teas = $this->type(array_get($options, 'type'));
            if( $teas->count() === 1 ){
                return $teas->first();
            } elseif ( $teas->count() > 0) {
                $this->items = $teas;
            }
        }
        
        if( array_has($options, 'caffeine') ) {
            $teas = $this->maxCaffeine(array_get($options, 'caffeine'));
            if( $teas->count() === 1 ){
                return $teas->first();
            } elseif ( $teas->count() > 0) {
                $this->items = $teas;
            }
        }

        if( array_has($options, 'rush') ) {
            $average = $this->average('time');
            $teas = $this->optimalBrewTime($average + array_get($options, 'rush'));
            if( $teas->count() === 1 ){
                return $teas->first();
            } elseif ( $teas->count() > 0) {
                $this->items = $teas;
            }
        }

        return $this->first();
    }
}
