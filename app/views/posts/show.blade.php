@extends('app')

@section('title', $post->title)

@section('content')
    <br><br/>
    <div class="text-center"><h2>Post</h2></div>
    <br><br/>
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">Success: {{{ Session::get('message') }}}</div>
    @endif
    {{'Posted by: '}}
    {{ link_to_route('users.show', $post->user->email, [$post->user->id]) }}
    <div class="text-center">
        <div class="well well-lg">
            <div class="well well-sm">
                <h4>
                    <div class="pull-right">
                        <div class="btn-group">
                            @if(Auth::user()->isAdmin() || Auth::user()->id == $post->user->id)
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            @endif
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#" data-action="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger delete-toggle">Delete</a></li>
                                <li><a href="#">{{ link_to_route('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-info']) }}</a></li>
                            </ul>
                        </div>
                    </div>
                    {{$post->title}}</h4></div>
            {{$post->content}}
        </div></div>
    @if(!$errors->isEmpty())
        <div class="alert alert-info" role="alert">Whoops there were errors!</div>
        <ul>
            @foreach($errors->all() as $message)
                <div class="alert alert-warning" role="alert"><br>{{{ $message }}}<br/></div>
            @endforeach
                @endif
                @if(Auth::check())
                <div class="text-center"><h3>Create comment</h3></div>
                <div class="text-center"><div class="col-md-12">

                    {{ Form::open(['route' => ['posts.comments.store','posts' => $post->id, 'user_id'=>Auth::user()->id]]) }}
                    <div class="col-md-10">
                    <div class="form-group">{{ Form::label('comment', 'Comment');}}
                    {{ Form::textarea('comment', Input::old('comment'), ['class'=>'form-control', 'maxlength'=>"300"]);}}
                    </div>
                        </div>
                    <div class="col-md-2">
                        <br>
                        {{ Form::submit('Submit', ['class'=>'form-control']);}}
                        </br>
                    </div>
                    {{ Form::close() }}

                </div></div>
                @endif
                <div class="clearfix"></div>
                <div class="text-center"><h3>Comments</h3></div>
                <br><br/>

    </ul>
        @include('posts.comments.show')


    @include('delete-modal')
@stop

