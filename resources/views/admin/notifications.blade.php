@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        @if ($unreadNotifications->count())
            <a href="{{route('admin.notifications.read.all')}}" class="btn btn-lg btn-success">Marcar todas como lidas!</a>
            <hr>
        @endif
    </div>
</div>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Notificação</td>
                <td>Criado em</td>
                <td>Ações</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($unreadNotifications as $n)
            <tr>
                <td>{{$n->data['message']}}</td>
                <td>{{$n->created_at->locale('pt')->diffForHumans()}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('admin.notifications.read', ['notification' => $n->id])}}" class="btn btn-sm btn-primary">Marcar como lida</a>
                    </div>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="3">
                        <div class="alert alert-warning">
                            Nenhuma noficação encontrada!
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
