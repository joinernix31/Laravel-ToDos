@extends('app')

@section('content')
<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        @if (session('success'))
          <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif

        @foreach ($errors->all() as $error )
        <div class="alert alert-danger">{{$error}}</div>
        @endforeach
        @if(session()->has('error'))
        <div class="alert alert-danger">
          {{session()->get('error')}}
        </div>
        @endif
        <div class="mb-3">
          <label for="Titulo" class="form-label">Titulo de la tarea</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="title">
        </div>
        <label for="category_ids" class="form-label">Categoria de la tarea</label>
        <select name="category_id" class="form-select">
          <option value="10005">test:formRequestID</option>
          @foreach ($categories as $category )
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
        <br>
        <button type="submit" class="btn btn-primary">Crear Nueva Tarea</button>
        </form>
        <div>
        @foreach ($todos as $todo )
          <div class="row py-1">
            <div class=" col-md-9 d-flex align-items-center">
              <a  href="{{ route('todos.show', ['todo' => $todo->id]) }}">{{ $todo->title }}</a>
            </div>
              <div class="col-md-3 d-flex justifi-contend-end">
                <form action="{{route ('todos.destroy', [$todo->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm">Eliminar</button>
    </form>
              </div>
          </div>
        @endforeach
      </div>
</div>
@endsection