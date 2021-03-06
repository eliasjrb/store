<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minha Loja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .front.row {
            margin-bottom: 40px;
        }
    </style>
    @yield('stylesheet')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 40px;">

    <a class="navbar-brand" href="{{route('home')}}">Minha Loja</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if(request()->is('/')) active @endif">
                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
            </li>

            @foreach ($categories as $category)
                <li class="nav-item @if(request()->is('category/'. $category->slug)) active @endif">
                    <a class="nav-link" href="{{route('category.single', ['slug' => $category->slug])}}">{{$category->name}}</a>
                </li>
            @endforeach
        </ul>

        <div class="my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item @if(request()->is('my-orders')) active @endif">
                        <a href="{{route('user.orders')}}" class="nav-link">Meus Pedidos</a>
                    </li>
                @endauth
                <li class="nav-item mr-3">
                    @if (session()->has('cart'))
                        <a href="{{route('cart.index')}}" class="nav-link">
                            <span class="badge badge-danger">{{count(session()->get('cart'))}}</span>
                            <i class="fa fa-shopping-cart fa-2x"></i>
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    @auth
    <div class="my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">    
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault();
                                                            document.querySelector('form.logout').submit(); ">
                    <i class="fa fa-share-square fa-2x"></i>
                    </a>
                    <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    @else
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{route('login')}}" class="nav-link">Login</a>
            </li>
        </ul>
    @endauth

    </div>
</nav>

<div class="container">
    @include('flash::message')
    @yield('content')
</div>
    <script  src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}"></script>
    @yield('scripts')
</body>
</html>