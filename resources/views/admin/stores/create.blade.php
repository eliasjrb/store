@extends('layouts.app')

@section('content')
    <h1>Criar Loja</h1>
    <form action="{{route('admin.stores.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nome Loja:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
         <div class="form-group">
            <label for="">Descrição:</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}">
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>
         <div class="form-group">
            <label for="">Telefone:</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}">
            @error('phone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>
         <div class="form-group">
            <label for="">Celular/Whatsapp:</label>
            <input type="text" class="form-control @error('mobile_phone') is-invalid @enderror" name="mobile_phone" value="{{old('mobile_phone')}}">
            @error('mobile_phone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>
        <div class="form-group">
            <label for="">Foto da Logo</label>
            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" >
            @error('logo')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                
            @enderror
        </div>
         <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Criar Loja</button>
        </div>
    </form>
@endsection