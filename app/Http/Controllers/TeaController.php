<?php

namespace App\Http\Controllers;

use App\Http\Apis\RecommendationApi;
use App\Http\Apis\TeaApi;
use App\Http\Requests\RecommendationQuery;
use App\Http\Requests\TeaStore;

class TeaController extends Controller
{
    protected $api;

    public function __construct(TeaApi $api)
    {
        $this->api = $api;
    }

    public function index()
    {
        return view('tea.index');
    }

    public function create(RecommendationApi $recommendations, RecommendationQuery $request)
    {
        $recommendation = $recommendations->query($request);

        return view('tea.create', compact('recommendation'));
    }

    public function store(TeaStore $request)
    {
        $tea = $this->api->store($request);

        return redirect()->route('tea.show', $tea->id);
    }
    
    public function show($id)
    {
        $tea = $this->api->show($id);
        
        return view('tea.show', compact('tea'));
    }
}
