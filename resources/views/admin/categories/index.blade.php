@extends('layouts.app')

@section('content')
 <a href="{{route('admin.categories.create')}}" class="btn btn-lg btn-success">Criar Categoria</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
            <tr>
                <th>{{$c->id}}</th>
                <th>{{$c->name}}</th>
                <th>{{$c->description}}</th>
                <th>
                    <div class="btn-group">
                        <a href="{{route('admin.categories.edit', ['category' => $c->id])}}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{route('admin.categories.destroy', ['category' => $c->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </div>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$categories->links()}}
@endsection
