<?php

namespace App\Repositories;
use App\Models\Todo;

class TodosRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Todo();
    }

    public function create($todo)
    {
        $todo->save();
    }
    public function all()
    {
        return $this->model->all();
    }
    public function show($id)
    {
        return $this->model::findOrFail($id);

    }
    public function destroy($id)
    {
        return $this->model::find($id);
    }
    public function update($id)
    {
        return $this->model::find($id);
    }

}
