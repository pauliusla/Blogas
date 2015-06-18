@extends('app')

@section('title', 'Profile')

@section('content')

    <form class="navbar-form navbar-left" role="search" method="get">
        <div class="form-group">
            <input type="text" maxlength="20" class="form-control" placeholder="Search" name="search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <br></br>
@stop