<?php

namespace App\Services\TeaBrewer\Http\Routes;

use App\Traits\ClassBasedRoutes;

class Api
{
    use ClassBasedRoutes;

    protected $namespace = 'App\Services\TeaBrewer\Http\Apis';

    public function map()
    {
        $this->router->group([
            'namespace' => $this->namespace,
            'prefix' => 'api/tea',
            'middleware' => 'api',
        ], function ($router) {
            $router->get('{id}')
                ->uses('TeaApi@show')
                ->name('api.tea.show');

            $router->post('/')
                ->uses('TeaApi@store')
                ->name('api.tea.store');

            $router->get('/')
                ->uses('TeaApi@index')
                ->name('api.tea.index');
        });
    }
}
