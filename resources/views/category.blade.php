@extends('layouts.front')

@section('content')
    <div class="row front">
        <div class="col-md-12 border-bottom mb-2">
            <h2>{{$category->name}}</h2>
        </div>
        
        @forelse ($category->products as $key => $product)
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
                <h3 class="alert alert-warning">Nenhum produto encontrado para a categoria!</h3>
            </div>
        @endforelse
    </div> 
@endsection