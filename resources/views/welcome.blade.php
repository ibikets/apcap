<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">FCT4U</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">



            <ul class="navbar-nav text-uppercase ml-auto">

                    @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ route('dashboard') }}">Home</a>
                        </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif

            </ul>
        </div>
    </div>
</nav>

<!-- Header -->
<header class="masthead" style="background-image:url(../img/aso_rock.jpg)">
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">FCT 4 You</div>
            {{--<div class="intro-heading text-uppercase">It's Nice To Meet You</div>--}}
            {{--<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#">Tell Me More</a>--}}
        </div>
    </div>
</header>


<!-- Team -->
<section class="bg-light page-section" id="team">
    <div class="container">
        <div class="row mt-0 mb-5">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Your Officials</h2>
                {{--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--}}
            </div>
        </div>

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                @foreach($designations as $count => $designation)
                    @if($designation->name == 'FCT Minister' || $designation->name == 'Minister of State' ||$designation->name == 'Senator' || $designation->name == 'House of Rep')
                        <a @if($count==0) class="nav-item nav-link active" @else class="nav-item nav-link" @endif id="{{str_replace(' ','',strtolower($designation->name))}}-tab" data-toggle="tab" href="#{{str_replace(' ','',strtolower($designation->name))}}" role="tab" aria-controls="{{str_replace(' ','',strtolower($designation->name))}}" aria-selected="true">{{$designation->name}}</a>
                    @endif
                @endforeach
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            @foreach($designations as $count => $designation)
                @if($designation->name == 'FCT Minister' || $designation->name == 'Minister of State' ||$designation->name == 'Senator' || $designation->name == 'House of Rep')
                    <div  @if($count == 0) class="tab-pane fade active show" @else class="tab-pane fade" @endif id="{{str_replace(' ','',strtolower($designation->name))}}" role="tabpanel" aria-labelledby="{{str_replace(' ','',strtolower($designation->name))}}-tab">
                        @include('includes.modals.welcome_list')
                    </div>
                @endif
            @endforeach
        </div>

    </div>

    <div class="container">
        <div class="row mt-0 mb-5">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Area Councils</h2>
                {{--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--}}
            </div>
        </div>

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                @foreach($lgas as $count => $lga)
                        <a @if($count==0) class="nav-item nav-link active" @else class="nav-item nav-link" @endif id="{{str_replace(' ','',strtolower($lga->name))}}-tab" data-toggle="tab" href="#{{str_replace(' ','',strtolower($lga->name))}}" role="tab" aria-controls="{{str_replace(' ','',strtolower($lga->name))}}" aria-selected="true">{{$lga->name}}</a>
                @endforeach
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            @foreach($lgas as $count => $lga)
                    <div  @if($count == 0) class="tab-pane fade active show" @else class="tab-pane fade" @endif id="{{str_replace(' ','',strtolower($lga->name))}}" role="tabpanel" aria-labelledby="{{str_replace(' ','',strtolower($lga->name))}}-tab">
                        @include('includes.modals.lga_home_list')
                    </div>
            @endforeach
        </div>

    </div>
</section>


<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <span class="copyright">Copyright &copy; Your Website 2019</span>
            </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                    <li class="list-inline-item">
                        <a href="#">Privacy Policy</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">Terms of Use</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Portfolio Modals -->

<!-- Modal 1 -->


<!-- Custom scripts for this template -->
<script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
