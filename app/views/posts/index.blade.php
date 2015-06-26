@extends('app')

@section('title', 'Posts')

@section('content')
    <form class="navbar-form navbar-left" role="search" method="get">
            <div class="form-group">
                <input type="text" maxlength="300" class="form-control" placeholder="Search" name="search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    <br><br/>
    <div class="text-center"><h2 class="post-listings">Posts</h2><hr></div>

    @if(Session::has('message'))
        <p><strong>Success:</strong> {{{ Session::get('message') }}}</p>
    @endif
        @foreach($posts as $post)
            {{'Posted by: '}}
            {{ link_to_route('users.show', $post->user->email, [$post->user->id]) }}
            <div class="text-center">
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
                            {{ link_to_route('posts.show', $post->title, [$post->id]) }}
                            ({{ $post->comments->count() }})</h4></div>
                    </div>
        @endforeach
    <br><br/>
    <div class="text-center">{{ $posts->links() }}</div>

@stop

@include('delete-modal')