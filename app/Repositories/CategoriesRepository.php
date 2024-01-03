<?php

namespace App\Repositories;

use  App\Models\Category;

class CategoriesRepository
{

    private $model;

    public function __construct()
    {
        $this->model = new Category();
    }

    public function all()
    {
        return $this->model->all();
    }
    public function create($category)
    {
        $category->save();
        return $category;
    }
    public function show($id)
    {
        return $this->model::find($id);

    }
    public function update($id, $input)
    {
        $category = $this->model::findOrFalil($id);
        $category -> name = $input -> name;
        $category -> color = $input -> color;
        $category->update();
    }
    public function paginate ($items)
    {
       return $this->model->latest()->paginate($items);
    }

    public function destroy($id)
    {
        $category = $this->model::findOrFail($id);
        if (!$category) {

            return response()->json(['error' => 'La categoría no existe.'], 404);
        }

        $category->todos()->delete();
        $category->delete();

        return response()->json(['message' => 'Categoría y todos eliminados correctamente.'], 204);
    }

}
