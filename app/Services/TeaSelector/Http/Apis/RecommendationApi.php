<?php

namespace App\Services\TeaSelector\Http\Apis;

use App\Http\Controllers\Controller;
use App\Services\TeaSelector\Entities\Recommendations;
use App\Services\TeaSelector\Http\Requests\RecommendationQuery;

class RecommendationApi extends Controller
{
    public function index()
    {
        return Recommendations::make();
    }

    public function query(RecommendationQuery $request)
    {
        $teas = $this->index();

        $options = $request->intersect(['type', 'caffeine', 'rush']);

        return $teas->optimalChoice($options);
    }
}
