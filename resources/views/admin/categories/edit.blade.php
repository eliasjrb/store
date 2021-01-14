@extends('layouts.front')

@section('content')
    <h1>Criar Categoria</h1>
    <form action="{{route('admin.categories.update', ['category' => $category->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nome da categoria:</label>
            <input type="text" class="form-control" name="name" value="{{$category->name}}">
        </div>
         <div class="form-group">
            <label for="">Descrição:</label>
            <input type="text" class="form-control" name="description" value="{{$category->description}}">
        </div>
    
         <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Atualizar Categoria</button>
        </div>
    </form>
@endsection