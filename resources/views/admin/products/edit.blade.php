@extends('layouts.front')

@section('content')
    <h1>Editar Produto</h1>
    <form action="{{route('admin.products.update', ['product' => $product->id])}}" method="post" enctype="multipart/form-data">
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
            <label for="">Fotos do Produto</label>
            <input type="file" name="photos[]" class="form-control @error('photos.*') is-invalid @enderror" multiple>
            @error('photos.*')
                <div class="invalid-feedback">
                    {{$message}}
                </div>  
            @enderror
        </div>
         <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Atualizar Produto</button>
        </div>
    </form>
    
    <hr>

    <div class="row">
        @foreach ($product->photos as $photo)
            <div class="col-4 d-flex">
                <img src="{{asset('storage/'. $photo->image)}}" alt="" class="img-fluid">
                <form action="{{route('admin.photo.remove')}}" method="POST" class="position-absolute float-left">
                    @csrf
                    <input type="hidden" name="photoName" value="{{$photo->image}}">
                    <button type="submit" class="btn btn-sm btn-danger ">X</button>
                </form>
            </div>            
        @endforeach
    </div>
@endsection