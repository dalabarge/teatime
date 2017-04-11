<?php

namespace App\Http\Apis;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeaStore;
use App\Repositories\Teas;
use Illuminate\Http\Request;

class TeaApi extends Controller
{
    protected $repository;

    public function __construct(Teas $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        return $this->repository->paginate(
            $request->intersect([
                'keyword',
                'order',
                'sort',
                'type',
                'max',
            ]));
    }

    public function store(TeaStore $request)
    {
        return $this->repository->create($request->all());
    }
    
    public function show($id)
    {
        return $this->repository->read($id);
    }
}
