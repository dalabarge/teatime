<?php

namespace App\Traits;

use Illuminate\Routing\Router;

trait ClassBasedRoutes
{
	protected $router;
    
    public function __construct(Router $router)
    {
        $this->router = $router;
    }
}
