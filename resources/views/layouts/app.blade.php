<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('icon/icon.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SingkongButas</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('cleanblog/css/clean-blog.min.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.html"><img style="width: 35px;" src="{{ asset('icon/icon.png') }}"> SingkongButas</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homepage.about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homepage.contact') }}">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu">
                        @foreach(\App\Category::all() as $item)
                            <a class="dropdown-item" href="{{ route('homepage', ['cat' => $item->id ]) }}">{{ $item->type }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <form action="{{ route('homepage')}}" method="GET">
                        <div class="input-group input-group-sm mb-3">
                                <input type="text" name="keyword" class="form-control input-sm" placeholder="Search..." style="opacity: 0.6;">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                                </div>
                        </div>
                    </form>
                </li>
            </ul>
            </div>
        </div>
        </nav>

        @yield('content')

        <hr>

        <!-- Footer -->
        <footer>
        <div class="container">
            <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                <li class="list-inline-item">
                    <a href="#">
                        <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://github.com/throwexceptions">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; SingkongButas 2018</p>
            </div>
            </div>
        </div>
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="/js/app.js"></script>

        <!-- Custom scripts for this template -->
        <script src="/cleanblog/js/clean-blog.min.js"></script>
</body>
</html>
