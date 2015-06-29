<?php

class CommentsController extends BaseController
{

    public function __construct()
    {
        $this->beforeFilter('auth', ['only' => []]);
    }

    public function index(Post $post)
    {
        $comments = Comment::paginate(5);

        return View::make('comments.index', compact('post', 'comments'));

    }


    public function create(Post $post)
    {
        return View::make('comments.create', compact('post'));
    }


    public function store(Post $post)
    {
        $validator = Validator::make($input = Input::all(), Comment::$rules);

        if ($validator->fails()) {

            return Redirect::back()->withErrors($validator)->withInput();
        }

        $comment = new Comment($input);

        $comment->user_id = Auth::user() ->id;

        $comment->post_id = $post ->id;

        $comment->save();

        return Redirect::route('posts.show', [$post->id])->with('message', 'Comment created');
    }

    public function show(Post $post, Comment $comment)
    {
        return View::make('comments.index', compact('comment'));
    }

    public function edit(Post $post, Comment $comment)
    {
        return View::make('comments.edit', compact('post', 'comment'));
    }

    public function update(Post $post, Comment $comment)
    {
        $validator = Validator::make($input = Input::all(), Comment::$rules);

        if ($validator->fails()) {

            return Redirect::route('comments.edit', $post->id, $comment->id)->withErrors($validator);
        }

        $comment->update($input);

        return Redirect::route('posts.comments.index', [$post->id, $comment->id])->with('message', 'Comment updated.');
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return Redirect::route('posts.show', $comment->post_id)->with('message', 'Comment deleted.');
    }
}
