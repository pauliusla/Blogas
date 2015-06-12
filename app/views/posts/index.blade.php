@extends('app')

@section('title', 'Posts')

@section('content')

    <center><h2 class="post-listings">Posts</h2><hr></center>
    @if(Session::has('message'))
        <p><strong>Success:</strong> {{{ Session::get('message') }}}</p>
    @endif
        @foreach($posts as $post)
            <center>
                    <div class="well well-sm">
                        <h4>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">{{ Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['posts.destroy', $post->id]]) }}
                                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                                {{ Form::close() }}</a></li>
                                        <li><a href="#">{{ link_to_route('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-info']) }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            {{ link_to_route('posts.show', $post->title, [$post->id]) }}
                            ({{ $post->comments->count() }})</h4></div>
                    </center>
        @endforeach

    </div>
    <br><br/>
    <center>{{ $posts->links() }}</center>

@stop