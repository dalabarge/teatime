<?php

namespace App\Services\TeaSelector\Http\Routes;

use App\Traits\ClassBasedRoutes;

class Api
{
    use ClassBasedRoutes;

    protected $namespace = 'App\Services\TeaSelector\Http\Apis';

    public function map()
    {
        $this->router->group([
            'namespace' => $this->namespace,
            'prefix' => 'api/recommendation',
            'middleware' => 'api',
        ], function($router) {

            $router->get('query')
                ->uses('RecommendationApi@query')
                ->name('api.recommendation.query');

            $router->get('/')
                ->uses('RecommendationApi@index')
                ->name('api.recommendation.index');
        });
    }
}
