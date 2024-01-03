<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteCategoryFormRequest;
use App\Http\Requests\ShowCategoryFormRequest;
use App\Http\Requests\UpdateCategoryFormRequest;
use App\Http\Resources\v1\Category\CategoryResource;
use App\Repositories\CategoriesRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoryRepository = $categoriesRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->all();
        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowCategoryFormRequest $category, $id)
    {
        $category =  $this->categoryRepository->show($id);
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryFormRequest $request, $id)
    {
        $input = $request->validate();
        $category = $this->categoryRepository->update($id, $input);
        return new CategoryResource($category);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteCategoryFormRequest $request, $id)
    {
        $category = $this->categoryRepository->destroy($id);

        if ($category) {
            $data = [
                'Id' => $id,
                'Delete' => true
            ];
            return response($data, 204);
        } else {
            $data = [
                'Id' => $request->id,
                'Delete' => false
            ];
            return response($data, 404);
        }
    }
}
