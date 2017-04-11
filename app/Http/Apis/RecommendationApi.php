<?php

namespace App\Http\Apis;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecommendationQuery;
use App\Models\Collections\Recommendations;

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
