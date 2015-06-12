@extends('app')

@section('title', $post->title)

@section('content')
    <br><br/>
    <center><h2>Post</h2></center>
    <br><br/>
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">Success: {{{ Session::get('message') }}}</div>
    @endif
    <center>
        <div class="well well-lg">
            <div class="well well-sm">
                <h4>
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">{{ Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['posts.destroy', $post->id]]) }}
                                        {{ Form::close() }}</a></li>
                                <li><a href="#">{{ link_to_route('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-info']) }}</a></li>
                            </ul>
                        </div>
                    </div>
                    {{$post->title}}</h4></div>
            {{$post->content}}
        </div></center>
    @if(!$errors->isEmpty())
        <div class="alert alert-info" role="alert">Whoops there were errors!</div>
        <ul>
            @foreach($errors->all() as $message)
                <div class="alert alert-warning" role="alert"><br>{{{ $message }}}<br/></div>
            @endforeach
                @endif
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
                <div class="clearfix"></div>
                <center><h3>Comments</h3></center>
                <br><br/>
    @foreach($post->comments as $comment)
                    <center>
                        <div class="well well-lg">
                            <div class="well well-sm">
                                <h4>
                                    <div class="pull-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                                                Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">
                                                        {{ Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['posts.comments.destroy', $post->id]]) }}
                                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                                        {{ Form::close() }}</a></li>
                                                <li><a href="#">
                                                        {{ link_to_route('posts.comments.edit', 'Edit', [$post->id, $comment->id], ['class' => 'btn btn-info']) }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    {{ $comment->commenter or trans('no.title') }}</h4></div>
                            {{ $comment->comment or trans('no.content') }}
                        </div></center>
    @endforeach
    </ul>
    <p>
        <p>
            <br><br/>
            {{--<center>{{link_to_route('posts.comments.index', 'Show more comments', $post->id)}}</center>--}}
        </p>
    </p>
    <br><br/>

@stop