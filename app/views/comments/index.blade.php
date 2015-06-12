@extends('app')

@section('title', 'Show comments')

@section('content')
    <br><br/>
    <center><h2>{{$post->title}}</h2></center>
    <center><h3>{{'Comments'}}</h3></center>
    @foreach($post->comments as $comment)

        <center>
                <div class="well well-lg">
                    <div class="well well-sm">
                        <h4>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">
                                            {{ Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['posts.comments.destroy', $post->id]]) }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                            {{ Form::close() }}</a></li>
                                    <li><a href="#">{{ link_to_route('posts.comments.edit', 'Edit', [$post->id, $comment->id], ['class' => 'btn btn-info']) }}</a></li>
                                </ul>
                            </li>
                            {{ $comment->commenter or trans('no.title') }}</h4></div>
                    {{ $comment->comment or trans('no.content') }}
                </div></center>

@endforeach
    <br><br/>
    <center>{{ $comments->links() }}</center>
    <br><br/>
    @stop
