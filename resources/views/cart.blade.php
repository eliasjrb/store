@extends('layouts.front')

@section('content')
    <div class="col-12">
        <h2>Carrinho de Compra</h2>
        <hr>
    </div>
    <div class="col-12">
        @if($carts)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ptroduto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{dd($carts)}} --}}
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($carts as $c)
                        <tr>
                            <th>{{$c['name']}}</th>
                            <th>R$ {{number_format($c['price'], 2 , ',', '.')}}</th>
                            <th>{{$c['amount']}}</th>
                            @php
                                $subtotal = $c['price'] * $c['amount'];
                                $total += $subtotal;
                            @endphp
                            <th>R$ {{number_format($subtotal , 2 , ',', '.')}}</th>
                            <th>
                                <a href="{{route('cart.remove', ['slug'=> $c['slug']])}}" class="btn btn-sm btn-danger">REMOVER</a>
                            </th>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="3">Total:</th>
                        <th colspan="2">R$ {{number_format($total, 2 ,',', '.')}}</th>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="col-12">
                <a href="{{route('checkout.index')}}" class="btn btn-success float-right">Concluir compra</a>
                <a href="{{route('cart.cancel')}}" class="btn btn-danger float-left">Cancelar compra</a>
            </div>
        @else
            <div class="alert alert-warning">Carrinho vazio...</div>
        @endif
    </div>
@endsection