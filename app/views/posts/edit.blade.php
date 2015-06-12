@extends('app')

@section('title', 'Edit Post')

@section('content')
    <h2>Edit Post</h2>
    <center><div class="col-md-2">
    {{ Form::model($post, ['method' => 'PUT', 'route' => ['posts.update', $post->id]]) }}
            <div class="form-group>
                        {{ Form::label('title', 'Title') }}
                        {{Form::text('title', Input::old('title'),['class' =>'form-control'] )}}
                    </div>
                    </div>
                    <div class="col-md-6">
            <div class="form-group>{{ Form::label('content', 'Content');}}
                    {{ Form::textarea('content', Input::old('content'), ['class'=>'form-control']);}}
                    </div>
                    <div class="col-md-2">
            {{ Form::submit('Submit', ['class'=>'form-control']);}}</div>
        </div>
    </div></center>
@endsection