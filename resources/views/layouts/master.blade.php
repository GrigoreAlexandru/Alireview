<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<style>body{background-color: #F0F1F0;}img{height:auto;}@media only screen and (max-width: 500px) {
        img {
            max-height: 23rem;
        }
    }</style>
    <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 16rem;">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Ali Review
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">

                    <li><a href="{{url('/items')}}">Items</a></li>
                    <li><a href="{{url('/items/create')}}">Add new item</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <form class="navbar-form navbar-left" method="get" action="{{action('ItemController@search')}}">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/lara/public/home">Home</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                </ul>
            </div>
        </div>
    </nav>

<div class="container">
    @include('inc.message')
    @yield('content')
</div>
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function () {

       $('ul.product-property-list').attr('class', 'list-group');

        $('li.property-item').attr('class', 'list-group-item');

        $('#like').click(function () {
            $.ajax({
                type: "POST",
                url: '{{url()->current()}}/like',

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data.includes('You') ){
                        $('#msg').html(data)
                        $('#msg').addClass('alert alert-danger')
                    } else {
                        $('#likes').html(parseInt($('#likes').html()) + 1)
                    }


                },



            });

        })
        $('#dislike').click(function () {
            $.ajax({
                type: "POST",
                url: '{{url()->current()}}/dislike',

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data.includes('You') ){
                        $('#msg').html(data)
                        $('#msg').addClass('alert alert-danger')
                    } else {
                        $('#likes').html(parseInt($('#likes').html()) - 1)
                    }


                },

            });

        })
    })
</script>
</body>
</html>
