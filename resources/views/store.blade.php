@extends('layouts.front')

@section('content')
    <div class="row front">
       
        <div class="col-4">
            @if ($store->logo)
            <img src="{{asset('storage/'. $store->logo)}}" alt="{{'Logo da loja'. $store->logo}}" class="img img-fluid">
        @else 
            <img src="https://via.placeholder.com/600X300.png?text=logo" alt="Loja sem logo" class="img img-fluid">   
        @endif
        </div>
        <div class="col-8">
            <h2>{{$store->name}}</h2>
            <p>
                {{$store->description}}
            </p>
            <p>
                <strong>Contato:</strong>
                <span>{{$store->phone}} || {{$store->mobile_phone}} </span>
            </p>
        </div>
        

        <div class="col-12 border-bottom border-top my-3">
            <h3>Produtos desta Loja</h3>
        </div>
        
        @forelse ($store->products as $key => $product)
            <div class="col-md-4">
                <div class="card" style="width: 98%;">
                    @if ($product->photos->count())
                        <img src="{{asset('storage/'.$product->photos->first()->image)}}" alt="" class="card-img-top">
                    @else
                        <img src="{{asset('assets/img/no-photo.jpg')}}" alt="" class="card-img-top">
                    @endif
                    <div class="card body">
                        <div class="col-12">
                            <h2 class="card-title">
                                {{$product->name}}
                            </h2>
                            <p class="card-text">
                                {{$product->description}}
                            </p>
                            <h3>
                                R$ {{number_format($product->price, 2, ',', '.')}}
                            </h3>
                        </div>
                        <a href="{{route('product.single', ['slug' => $product->slug])}}" class="btn btn-success ">
                            Ver Produto
                        </a>
                    </div>
                </div>
            </div>
            @if (($key + 1) % 3 == 0) 
                </div> <div class="row front">
            @endif
        @empty
            <div class="col-12">
                <h3 class="alert alert-warning">Nenhum produto encontrado para a Loja!</h3>
            </div>
        @endforelse
    </div> 
@endsection