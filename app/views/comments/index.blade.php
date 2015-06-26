@extends('app')

@section('title', 'Show comments')

@section('content')
    <br><br/>
    <div class="text-center"><h2>{{$post->title}}</h2></div>
    <div class="text-center"><h3>{{'Comments'}}</h3></div>
    @foreach($post->comments as $comment)
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
                    {{ $comment->user->email or trans('no.title') }}</h4></div>
            {{ $comment->comment or trans('no.content') }}
        </div>
        </div>
@endforeach
    <br><br/>
    <div class="text-center">{{ $comments->links() }}</div>
    <br><br/>

@include('delete-modal')
@stop