@extends('app')
<title>Create Post</title>
@section('content')
    <h2>Create Post</h2>
    @if(!$errors->isEmpty())
    <p>Whoops there were errors!</p>
    <ul>
        @foreach($errors->all() as $message)
            <li>{{{ $message }}}</li>
        @endforeach
    </ul>
    @endif

    <div class="text-center"><div class="col-md-12">

            {{ Form::open(['route' => ['posts.store']]) }}
            <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        {{Form::text('title', Input::old('title'),['class' =>'form-control', 'maxlength'=>"300"] )}}
                    </div>
                    </div>
                    <div class="col-md-12">
            <div class="form-group">{{ Form::label('content', 'Content');}}
                    {{ Form::textarea('content', Input::old('content'), ['class'=>'form-control', 'maxlength'=>"300"]);}}
                    </div>
                    <div class="col-md-2">
            {{ Form::submit('Submit', ['class'=>'form-control']);}}</div>
        </div>
        </div></div>
@stop