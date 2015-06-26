@extends('app')

@section('title', 'Profile')

@section('content')

    <form class="navbar-form navbar-left" role="search" method="get">
        <div class="form-group">
            <input type="text" maxlength="20" class="form-control" placeholder="Search" name="search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <br><br/>
    <div class="text-center"><h2>Registered users</h2></div>
    <div> @if (Auth::user()->IsAdmin())
        @foreach($users as $user)
                <div class="well well-sm">
                    <h4>
                        {{ link_to_route('users.show', $user->email, [$user->id]) }}
                        {{ ' user is: ', $user->role }}
                    </h4>
                </div>
        @endforeach
            <div class="text-center">{{ $users->links() }}</div>
              @endif
    </div>
    <br><br/>
@stop