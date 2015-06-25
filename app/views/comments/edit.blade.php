@extends('app')

@section('title', 'Edit Comment')

@section('content')
    @if(Auth::user()->isAdmin() || Auth::user()->email == $comment->user->email)
    <h2>Edit Comment</h2>
    <div class="text-center"><div class="col-md-2">
            {{ Form::model($comment, ['method' => 'PUT', 'route' => ['posts.comments.update', $comment->post_id, $comment->id ]]) }}
            </div>
                    <div class="col-md-6">
            <div class="form-group">{{ Form::label('comment', 'Comment');}}
                    {{ Form::textarea('comment', Input::old('comment'), ['class'=>'form-control', 'maxlength'=>"300"]);}}
                    </div>
                    <div class="col-md-2">
            {{ Form::submit('Submit', ['class'=>'form-control']);}}</div>
        </div></div>
@endif
@stop
