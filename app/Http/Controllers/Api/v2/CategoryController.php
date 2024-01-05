<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\ShowCategoryFormRequest;
use App\Http\Resources\v2\Category\CategoryCollection;
use App\Http\Resources\v2\Category\CategoryResource;
use App\Models\Category;
use App\Repositories\CategoriesRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index()
    {
        $category = $this->categoriesRepository->paginate(2);
        return new CategoryCollection($category);
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
        $category =  $this->categoriesRepository->show($id);
        return new CategoryResource($category);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
