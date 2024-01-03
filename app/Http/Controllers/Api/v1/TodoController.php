<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowTodoFormRequest;
use App\Http\Resources\v1\Todo\TodoResource;
use App\Models\Todo;
use App\Repositories\TodosRepository;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct(TodosRepository $todosRepository)
    {
        $this->todoRepository = $todosRepository;
    }

    public function index()
    {
        $todos = $this->todoRepository->all();
        return TodoResource::collection($todos);
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
    public function show(ShowTodoFormRequest $request, $id)
    {
        $todo = $this->todoRepository->show($id);

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
