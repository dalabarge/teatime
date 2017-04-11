<?php

namespace App\Http\Controllers;

use App\Tea;
use App\Http\Requests\TeaStore;
use Illuminate\Http\Request;

class TeaController extends Controller
{
    public function index()
    {
        return view('tea.index');
    }

    public function create(Request $request)
    {
        $recommendation = $this->getRecommendation($request);

        return view('tea.create', compact('recommendation'));
    }

    public function store(TeaStore $request)
    {
        $tea = new Tea;
        $tea->fill($request->toArray());
        $tea->save();

        return redirect()->to($tea->id);
    }
    
    public function show(Tea $tea)
    {
        return view('tea.show', compact('tea'));
    }

    public function getRecommendation(Request $request)
    {        
        $recommendations = collect(config('teas'));
        
        if( $type = $request->get('type') ) {
            $recommendations = $recommendations->where('type', $type);
            if( $recommendations->count() === 1 ){
                return $recommendations->first();
            }
        }
        
        if( $request->has('caffeine') ) {
            $caffeine = $request->get('caffeine');
            $recommendations = $recommendations->where('caffeine', '<=', $caffeine);
            if( $recommendations->count() === 1 ){
                return $recommendations->first();
            }
        }

        if( $request->has('rush') ) {
            $rush = $request->get('rush');
            // @todo reduce by time
        }

        return $recommendations->first();
    }
}
