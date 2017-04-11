<?php

namespace App\Http\Apis;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeaStore;
use App\Models\Tea;

class TeaApi extends Controller
{
    protected $model;

    public function __construct(Tea $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->all();
    }

    public function store(TeaStore $request)
    {
        $tea = new $this->model;
        $tea->fill($request->toArray());
        $tea->save();

        return $tea;
    }
    
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }
}
