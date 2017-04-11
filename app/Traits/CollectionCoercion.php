<?php

namespace App\Traits;

use Illuminate\Support\Arr;

trait CollectionCoercion
{
	public function __construct($items = [])
    {
        $items = $this->getArrayableItems($items);
        $this->items = $this->coerceToArrayOfObjects($items);
    }

	public static function make($items = [])
	{
		return new static(array_merge($items, config('teas', [])));
	}

    public function prepend($value, $key = null)
    {
        $recommendation = $this->coerceToObject($value);

        $this->items = Arr::prepend($this->items, $recommendation, $key);

        return $this;
    }

    public function offsetSet($key, $value)
    {
    	$recommendation = $this->coerceToObject($value);

        if (is_null($key)) {
            $this->items[] = $recommendation;
        } else {
            $this->items[$key] = $recommendation;
        }
    }

    protected function coerceToObject($item)
    {
        return new $this->object($item);
    }

    protected function coerceToArrayOfObjects($items)
    {
    	foreach($items as $key => $item) {
    		$items[$key] = $this->coerceToObject($item);
    	}

    	return $items;
    }
}