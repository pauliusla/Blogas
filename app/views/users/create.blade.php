@extends('app')

@section('title', 'Register')

@section('content')
    <h2>Register</h2>
    @if(!$errors->isEmpty())
        <p>Whoops there were errors!</p>
        <ul>
            @foreach($errors->all() as $message)
                <li>{{{ $message }}}</li>
            @endforeach
        </ul>
    @endif
    {{ Form::open(['route' => ['users.store']]) }}
    {{ Form::label('first_name', 'First Name') }}
    {{ Form::text('first_name', Input::old('first_name'),['class' =>'form-control'] )}}
    {{ Form::label('last_name', 'Last Name');}}
    {{ Form::text('last_name', Input::old('last_name'), ['class'=>'form-control'])}}
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', Input::old('email'), ['class' =>'form-control']) }}
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', ['class' => 'form-control']) }}
    {{ Form::submit('Submit', ['class'=>'form-control'])}}
    @stop