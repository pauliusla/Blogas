@extends('app')

@section('content')
    <h2>Create Comment</h2>

    <center><h3>Create comment</h3></center>
    <center><div class="col-md-2">

            {{ Form::open(['route' => ['posts.comments.store','posts' => $post->id]]) }}
            <div class="form-group>
                        {{ Form::label('commenter', 'Commenter') }}
                        {{Form::text('commenter', Input::old('commenter'),['class' =>'form-control'] )}}
                    </div>
                    </div>
                    <div class="col-md-6">
            <div class="form-group>{{ Form::label('comment', 'Comment');}}
                    {{ Form::textarea('comment', Input::old('comment'), ['class'=>'form-control']);}}
                    </div>
                    <div class="col-md-2">
            {{ Form::submit('Submit', ['class'=>'form-control']);}}</div>
        </div>
        </div></center>
    <p>
        {{ link_to_route('posts.comments.index', 'Back to Comments') }}
    </p>
@stop