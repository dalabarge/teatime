<?php

namespace App\Services\TeaBrewer\Http\Routes;

use App\Traits\ClassBasedRoutes;

class Web
{
    use ClassBasedRoutes;

    protected $namespace = 'App\Services\TeaBrewer\Http\Controllers';

    public function map()
    {
        $this->router->group([
            'namespace' => $this->namespace,
            'middleware' => 'web',
        ], function ($router) {
            $router->get('/')
                ->uses('TeaController@index')
                ->name('tea.index');

            $router->group(['prefix' => 'tea'], function ($router) {
                $router->get('create')
                    ->uses('TeaController@create')
                    ->name('tea.create');

                $router->post('/')
                    ->uses('TeaController@store')
                    ->name('tea.store');

                $router->get('{id}')
                    ->uses('TeaController@show')
                    ->name('tea.show');
            });
        });
    }
}
