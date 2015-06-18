@extends('app')

@section('title', 'User Profile')

@section('content')
    <div class="text-center"><h2>You are now visiting</h2></div>
    @if ($user->isAdmin())
    <br>{{'User is admin'}}</br>
        @else
        <br>
        {{'User is Not admin'}}
        </br>
    @endif
<div class="text-center"><h2>{{$user->email}}</h2></div>
    @stop