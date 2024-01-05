<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\DeleteCategoryFormRequest;
use App\Http\Requests\Category\ShowCategoryFormRequest;
use App\Http\Requests\Category\UpdateCategoryFormRequest;
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
        $input = $request->validated();
        $category = $this->categoryRepository->update($id, $input);
        return new CategoryResource($category);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteCategoryFormRequest $request, $id)
    {
        // Utiliza $id en lugar de $request->id
        $category = $this->categoryRepository->destroy($id);

        $data = [
            'Id' => $id,
            'Delete' => $category ? true : false,
        ];

        return response()->json($data, $category ? 200 : 404);
    }
//    public function destroy(DeleteCategoryFormRequest $request, $id)
//    {
//        $category = $this->categoryRepository->destroy($id);
//
//        if ($category) {
//            $data = [
//                'Id' => $request->id,
//                'Delete' => true
//            ];
//            return response($data, 200);
//        } else {
//            $data = [
//                'Id' => $request->id,
//                'Delete' => false
//            ];
//            return response($data, 404);
//        }
//    }
}
