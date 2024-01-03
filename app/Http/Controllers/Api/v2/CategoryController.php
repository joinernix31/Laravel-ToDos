<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowCategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\v2\Category\CategoryResource;
use App\Http\Resources\v2\Category\CategoryCollection;
use App\Repositories\CategoriesRepository;
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
