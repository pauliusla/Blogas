@extends('app')

@section('title', 'Profile')

@section('content')

    <form class="navbar-form navbar-left" role="search" method="get">
        <div class="form-group">
            <input type="text" maxlength="40" class="form-control" placeholder="Search" name="search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <br></br>

    <h2>{{'Found users'}}</h2>
    @foreach($users as $user)
        <div class="well well-sm">
            <h4>
                {{ link_to_route('users.show', $user->email, [$user->id]) }}
            </h4>
        </div>
    @endforeach
@stop