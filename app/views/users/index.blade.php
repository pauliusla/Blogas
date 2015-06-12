@extends('app')

@section('title', 'Profile')

@section('content')

    <h2>{{'All users'}}</h2>
    @foreach($users as $user)
        <div class="well well-sm">
            <h4>
        {{ link_to_route('users.show', $user->email, [$user->id]) }}
        </h4>
        </div>
    @endforeach
@stop