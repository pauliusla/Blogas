@extends('app')

@section('title', 'Login')

@section('content')

    <h1>Login</h1>
    @if (Session::has('flash_error'))
        <div id="flash_error">{{ Session::get('flash_error') }}</div>
    @endif
    {{ Form::open(['route' => ['authenticate'], 'method' => 'post']) }}

    <p>
        {{ Form::label('email', 'Email') }}<br/>
        {{ Form::text('email', Input::old('email'), ['maxlength'=>"40"]) }}
    </p>

    <p>
        {{ Form::label('password', 'Password') }}<br/>
        {{ Form::password('password') }}
    </p>

    <p>{{ Form::submit('Login') }}</p>

    {{ Form::close() }}
@stop