@extends('app')

@section('title', 'Edit Post')

@section('content')
    @if(Auth::user()->isAdmin() || Auth::user()->id == $post->user->id)
    <h2>Edit Post</h2>
    <div class="text-center"><div class="col-md-12">
    {{ Form::model($post, ['method' => 'PUT', 'route' => ['posts.update', $post->id]]) }}
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
        </div></div>
    @else

        <h3>{{'No eccess'}}</h3>

    @endif
@endsection