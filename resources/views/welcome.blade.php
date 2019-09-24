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

<!-- Clients -->
<section class="py-5">
    <div class="container">
        <div class="row align-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6 offset-4">

                <form class="form-inline">
                    <div class="form-group mx-sm-3 mb-2">
                        <select class="form-control" id="state">
                            @foreach($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                </form>

            </div>
        </div>
    </div>
</section>

<!-- Team -->
<section class="bg-light page-section" id="team">
    <div class="container">
        <div class="row mt-0">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Your Officials</h2>
                {{--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--}}
            </div>
        </div>


        <div class="col-md-12 mx-auto">
                @if(count($positions) > 0)
                    @foreach($positions as $position)
                        <a class="btn btn-primary" data-toggle="collapse" href="#{{str_replace(' ','',strtolower($position->name))}}" role="button" aria-expanded="false" aria-controls="minister">{{ $position->name }}</a>
                    @endforeach
                @endif
        </div>


        <div class="row">
            @foreach($officials as $official)
            @if($official->position->name == "Governor" || $official->position->name == "FCT Minister")
                <div class="col-sm-6 mx-auto">
                    <div class="team-member collapse multi-collapse" id="{{str_replace(' ','',strtolower($official->position->name))}}">
                        <a href="#" data-toggle="modal" data-target="#profile-{{ $official->id }}"><img class="mx-auto rounded-circle" src="{{ asset($official->photo) }}" alt=""></a>
                        <h4>{{ $official->name }}</h4>
                        <p class="text-muted">{{ $official->position->name }}</p>
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
                </div>

                @include('includes.modals.officials_list_fp_modal')
            @endif
            @endforeach
        </div>

        <div class="row">
            @foreach($officials as $official)
                @if($official->position->name == "Senator")
                    <div class="col-sm-6 mx-auto">
                        <div class="team-member collapse multi-collapse" id="{{str_replace(' ','',strtolower($official->position->name))}}">
                            <a href="#" data-toggle="modal" data-target="#profile-{{ $official->id }}"><img class="mx-auto rounded-circle" src="{{ asset($official->photo) }}" alt=""></a>
                            <h4>{{ $official->name }}</h4>
                            <p class="text-muted">{{ $official->position->name }}</p>
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
                    </div>

                    @include('includes.modals.officials_list_fp_modal')
                @endif
            @endforeach
        </div>

        <div class="row">
            @foreach($officials as $official)
                @if($official->position->name == "House of Rep")
                    <div class="col-sm-6 mx-auto">
                        <div class="team-member collapse multi-collapse" id="{{str_replace(' ','',strtolower($official->position->name))}}">
                            <a href="#" data-toggle="modal" data-target="#profile-{{ $official->id }}"><img class="mx-auto rounded-circle" src="{{ asset($official->photo) }}" alt=""></a>
                            <h4>{{ $official->name }}</h4>
                            <p class="text-muted">{{ $official->position->name }}</p>
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
                    </div>

                    @include('includes.modals.officials_list_fp_modal')
                @endif
            @endforeach
        </div>

        {{--LGA Menu--}}
        <div class="row">

            @foreach($officials as $official)
                @if($official->position->name == "Local Government" || $official->position->name == "Chairman")
                    <div class="col-sm-12 mx-auto">
                        <div class="team-member collapse multi-collapse" id="{{str_replace(' ','',strtolower($official->position->name))}}">
                            {{--@if($position->name == 'Local Government' )--}}
                            {{--<div class="col-md-12 my-2 mx-auto">--}}
                                @foreach($wards as $ward)

                                        <a class="btn btn-primary" data-toggle="collapse" href="#{{str_replace(' ','',strtolower($ward->name))}}" role="button" aria-expanded="false" aria-controls="minister">{{ $ward->name }}</a>

                                @endforeach
                            {{--</div>--}}
                            {{--@endif--}}
                        </div>
                    </div>
                @endif
            @endforeach

        </div>

        <div class="row">

            @foreach($officials as $official)
                @if($official->position->name == "Chairman" || $official->position->name == "Vice Chairman")
                    <div class="col-sm-6 mx-auto">
                        <div class="team-member collapse multi-collapse" id="{{str_replace(' ','',strtolower($official->position->name))}}">
                            <a href="#" data-toggle="modal" data-target="#profile-{{ $official->id }}"><img class="mx-auto rounded-circle" src="{{ asset($official->photo) }}" alt=""></a>
                            <h4>{{ $official->name }}</h4>
                            <p class="text-muted">{{ $official->position->name }}</p>
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
                    </div>

                    @include('includes.modals.officials_list_fp_modal')
                @endif
            @endforeach
        </div>

        <div class="row">
            @foreach($officials as $official)
                @if($official->position->name == "Ward Councillor" || $official->position->name == "Councillor")
                    <div class="col-sm-6 mx-auto">
                        <div class="team-member collapse multi-collapse" id="{{str_replace(' ','',strtolower($official->position->name))}}">
                            <a href="#" data-toggle="modal" data-target="#profile-{{ $official->id }}"><img class="mx-auto rounded-circle" src="{{ asset($official->photo) }}" alt=""></a>
                            <h4>{{ $official->name }}</h4>
                            <p class="text-muted">{{ $official->position->name }}</p>
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
                    </div>

                    @include('includes.modals.officials_list_fp_modal')
                @endif
            @endforeach
        </div>

        <div class="row">

            @if(count($officials) >0)
                <div class="card-body p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Designation</th>
                            <th>State</th>
                            <th>Constituency</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($officials as $official)
                            <tr>
                                <td><a href="#" data-toggle="modal" data-target="#profile-{{ $official->id }}">{{ $official->name }}</a></td>
                                <td>{{ $official->mobile }}</td>
                                <td>{{ $official->position->name }}</td>
                                <td>{{ $official->state->name }}</td>
                                <td>{{ $official->constituency->name }}</td>

                            </tr>


                            @include('includes.modals.officials_list_fp_modal')
                        @endforeach

                        </tbody>
                    </table>

                </div>
                {{--<div class=text-right>{{ $officials->links() }}</div>--}}
            @endif

        </div>
        {{--<div class="row">--}}
            {{--<div class="col-lg-8 mx-auto text-center">--}}
                {{--<p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</section>

<!-- Contact -->
{{--<section class="page-section" id="contact">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-12 text-center">--}}
                {{--<h2 class="section-heading text-uppercase">Contact Us</h2>--}}
                {{--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-12">--}}
                {{--<form id="contactForm" name="sentMessage" novalidate="novalidate">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="form-group">--}}
                                {{--<input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">--}}
                                {{--<p class="help-block text-danger"></p>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">--}}
                                {{--<p class="help-block text-danger"></p>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">--}}
                                {{--<p class="help-block text-danger"></p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="form-group">--}}
                                {{--<textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>--}}
                                {{--<p class="help-block text-danger"></p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                        {{--<div class="col-lg-12 text-center">--}}
                            {{--<div id="success"></div>--}}
                            {{--<button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

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
