@extends('app')

@section('title', 'Show comments')

@section('content')
    @foreach($post->comments as $comment)
    <h2>{{$comment->commenter}}</h2>
    <ul>
        <li>
            <div>{{$comment->comment}}</div>
        </li>
    </ul>
    @endforeach
    @stop