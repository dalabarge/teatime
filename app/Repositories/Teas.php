<?php

namespace App\Repositories;

use App\Models\Tea;

class Teas
{	
    protected $model;

    public function __construct(Tea $model)
    {
        $this->model = $model;
    }

	public function all()
	{
		return $this->model->all();
	}

	public function query($filters = [])
	{
		$query = $this->model->newQuery();
		
		if( array_has($filters, 'keyword') ) {
			$query->keyword(array_get($filters, 'keyword'));
		}

		if( array_has($filters, 'type') ) {
			$query->ofType(array_get($filters, 'type'));
		}
		
		$order = array_get($filters, 'order', 'id');
		$sort = strtolower(array_get($filters, 'sort', 'asc')) === 'asc' ? 'asc' : 'desc';
		$query->orderBy($order, $sort);

		return $query;
	}

	public function paginate($filters = [])
	{
		$max = array_get($filters, 'max', 10);

		return $this->query($filters)
			->paginate($max)
			->appends($filters);
	}

	public function create($attributes)
	{
		$tea = new $this->model;
        $tea->fill($attributes);
        $tea->save();

        return $tea;
	}

	public function read($id)
	{
		return $this->model->findOrFail($id);
	}
}
