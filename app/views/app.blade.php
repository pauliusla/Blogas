<!doctype html>
<html lang="en">
<head>
    {{ HTML::style(asset('/css/bootstrap.css')) }}
    <meta charset="UTF-8">
    <title>@yield('title', 'Document')</title>
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{route ('home')}}">Home</a> </li>
                @if(Auth::check())
                    {{-- Kur as prisijunges--}}
                    <li><a href="{{ route('posts.index') }}">Posts</a></li>
                    <li>{{link_to_route('users.index', 'Users')}}</li>
                    <li>{{link_to_route('users.show', 'User Profile', Auth::user()->id)}}</li>
                    <li><a href="{{route('posts.create')}}">Create Post</a> </li>
                    <li>{{link_to_route('logout', 'Log Out')}}</li>

                @else
                    {{-- Kur neprisijunges--}}
                    <li><a href="{{route('users.create')}}">Register</a></li>
                    <li><a href="{{route('login')}}">Login</a></li>
                @endif

            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <div class="starter-template">

    </div>
    @yield('content')
    </div>

{{ HTML::script(asset('/js/jquery.min.js')) }}
{{ HTML::script(asset('/js/bootstrap.min.js')) }}
@yield('scripts')

</body>
</html>