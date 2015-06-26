@extends('app')

@section('title', 'Register')

@section('content')
    <h2>Register</h2>
    @if(!$errors->isEmpty())
        <p>Whoops there were errors!</p>
        <ul>
            @foreach($errors->all() as $message)
                <div class="alert alert-warning" role="alert"><br><li>{{{ $message }}}<br/></li>
            @endforeach
        </ul>
    @endif
    {{ Form::open(['route' => ['users.store']]) }}
    {{ Form::label('first_name', 'First Name') }}
    {{ Form::text('first_name', Input::old('first_name'),['class' =>'form-control', 'maxlength'=>"20"] )}}
    {{ Form::label('last_name', 'Last Name');}}
    {{ Form::text('last_name', Input::old('last_name'), ['class'=>'form-control', 'maxlength'=>"20"])}}
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', Input::old('email'), ['class' =>'form-control', 'maxlength'=>"100"]) }}
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', ['class' => 'form-control']) }}
    {{ Form::submit('Submit', ['class'=>'form-control'])}}
    @stop