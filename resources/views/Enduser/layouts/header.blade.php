<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pharma &mdash; Colorlib Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/Enduser/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/Enduser/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Enduser/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Enduser/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Enduser/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Enduser/css/owl.theme.default.min.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/Enduser/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/Enduser/css/style.css') }}">

</head>

<body>

    <div class="site-wrap">


        <div class="site-navbar py-2">

            <div class="search-wrap">
                <div class="container">
                    <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                    <form action="#" method="post">
                        <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
                    </form>
                </div>
            </div>

            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <div class="site-logo">
                            <a href="index.html" class="js-logo-clone">Pharma</a>
                        </div>
                    </div>
                    <div class="main-nav d-none d-lg-block">
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('home.shop') }}">Store</a></li>
                                <li class="has-children">
                                    <a href="#">Categories</a>
                                    <ul class="dropdown">
                                        @foreach ($categories as $category)
                                            <li>{{ $category->name }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                                {{-- <form method="post" action="{{route('user.logout')}}">
                    @csrf
                    <button type="submit" class="btn btn-block btn-outline-danger btn-sm">Signout</button>
                    </form> --}}
                                @if (!Auth()->user())
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                @else
                                    <form method="post" action="{{ route('user.logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-block btn-outline-danger btn-sm">Signout</button>
                                    </form>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <div class="icons">
                        <a href="#" class="icons-btn d-inline-block js-search-open"><span
                                class="icon-search"></span></a>
                        <a href="{{ route('cart.index') }}" class="icons-btn d-inline-block bag">
                            <span class="icon-shopping-bag"></span>
                        </a>
                        <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                                class="icon-menu"></span></a>
                    </div>
                </div>
            </div>
        </div>
