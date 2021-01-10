@extends('layouts.app')

@section('content')
    <h1>Editar Produto</h1>
    <form action="{{route('admin.products.update', ['product' => $product->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nome Produto:</label>
            <input type="text" class="form-control" name="name" value="{{$product->name}}">
        </div>
         <div class="form-group">
            <label for="">Descrição:</label>
            <input type="text" class="form-control" name="description" value="{{$product->description}}">
        </div>
         <div class="form-group">
            <label for="">Conteúdo:</label>
            <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$product->body}}</textarea>
        </div>
         <div class="form-group">
            <label for="">Preço:</label>
            <input type="text" class="form-control" name="price" value="{{$product->price}}">
        </div>
        <div class="form-group">
            <select name="categories[]" id="" class="form-control" multiple>
                <option value="">Selecione um item</option>
                @foreach ($categories as $c)
                    <option value="{{$c->id}}"
                        @if($product->categories->contains($c)) selected @endif
                        >{{$c->name}}</option>
                @endforeach
            </select>
        </div>
         <div class="form-group">
            <label for="">Slug:</label>
            <input type="text" class="form-control" name="slug" value="{{$product->slug}}">
        </div>
         <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Atualizar Produto</button>
        </div>
    </form>
@endsection