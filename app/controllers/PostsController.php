<?php

class PostsController extends BaseController
{

    public function __construct()
    {
        $this->beforeFilter('auth', ['only' => []]);
    }

    public function index()
    {
        if ($search = Input::get('search')) {

            $posts = Post::search($search)->paginate(10);

            return View::make('posts.index', compact('posts'));
        }

        $posts = Post::paginate(10);

        return View::make('posts.index', compact('users', 'posts'));
    }

    public function create()
    {
        return View::make('posts.create');
    }

    public function store()
    {
        $validator = Validator::make($input = Input::all(), Post::$rules);

        if ($validator->fails()) {

            return Redirect::route('posts.create')->withErrors($validator);
        }

        Auth::user()->posts()->create($input);

        return Redirect::route('posts.index')->with('message', 'Post created');
    }

    public function show(Post $post)
    {
        return View::make('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return View::make('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $validator = Validator::make($input = Input::all(), Post::$rules);

        if ($validator->fails()) {

            return Redirect::route('posts.edit', $post->id)->withErrors($validator);
        }

        $post->update($input);

        return Redirect::route('posts.index')->with('message', 'Post edited');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return Redirect::route('posts.index')->with('message', 'Post deleted.');
    }
}
