<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todos\ShowTodoFormRequest;
use App\Http\Resources\v2\Todo\TodoResource;
use App\Models\Todo;
use App\Repositories\TodosRepository;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public  function  __construct(TodosRepository $todosRepository)
    {
        $this->TodoRepository = $todosRepository;
    }
    public function index()
    {
        //
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
    public function show(ShowTodoFormRequest $todo, $id)
    {
        $todo = $this->TodoRepository->show($id);
        return new TodoResource($todo);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
