@foreach($post->comments as $comment)
    <div class="text-center">
        <div class="well well-lg">
            <div class="well well-sm">
                <h4>
                    <div class="pull-right">
                        <div class="btn-group">
                            @if(Auth::user()->isAdmin() || Auth::user()->email == $comment->user->email)
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">

                                    Action <span class="caret"></span>
                                </button>
                            @endif
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"
                                       data-action="{{ route('posts.comments.destroy', [$post->id, $comment->id]) }}"
                                       class="btn btn-danger delete-toggle">Delete</a></li>
                                <li>
                                    <a href="#">{{ link_to_route('posts.comments.edit', 'Edit', [$post->id, $comment->id], ['class' => 'btn btn-info']) }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{ $comment->user->email or trans('no.title') }}</h4>
            </div>
            {{ $comment->comment or trans('no.content') }}
        </div>
    </div>
@endforeach
