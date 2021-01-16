@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 border-bottom my-2">
            <h2>Meus Pedidos</h2>
        </div>
        <div class="col-12">
            <div id="accordion">
                @forelse ($userOrders as $key => $order)
                    <div class="card">
                        <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                Pedido Nº {{$order->reference}}
                            </button>
                        </h5>
                        </div>
                    
                        <div id="collapse{{$key}}" class="collapse @if($key == 0) show @endif" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <ul>
                                @php $items = unserialize($order->items); @endphp

                                @foreach ($items as $item)
                                    <li>{{$item['name']}} | R$ {{number_format($item['price'] * $item['amount'], 2 , ',', '.')}}
                                    <br>
                                    Quantidade pedida: {{$item['amount']}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-warning">Nenhum pedido recebido!</div>
                @endforelse
            </div>
            <div class="col-12 border-top my-2 py-2">
                
                {{$userOrders->links()}}
            </div>
        </div>
    </div>
@endsection