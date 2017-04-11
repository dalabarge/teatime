<?php

namespace App\Http\Apis;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecommendationQuery;

class RecommendationApi extends Controller
{
    public function index()
    {
        return collect(config('teas'));
    }

    public function query(RecommendationQuery $request)
    {
        $teas = $this->index();
        
        if( $type = $request->get('type') ) {
            $teas = $teas->where('type', $type);
            if( $teas->count() === 1 ){
                return $teas->first();
            }
        }
        
        if( $request->has('caffeine') ) {
            $caffeine = $request->get('caffeine');
            $teas = $teas->where('caffeine', '<=', $caffeine);
            if( $teas->count() === 1 ){
                return $teas->first();
            }
        }

        if( $request->has('rush') ) {
            $rush = $request->get('rush');
            // @todo reduce by time
        }

        return $teas->first();
    }
}
