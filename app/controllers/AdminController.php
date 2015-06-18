<?php

class AdminController extends BaseController {

	public function index()
	{
        $users = User::all();

        return View::make('users.index', compact('users'));
	}

    public function editPost(Post $post)
    {
        return View::make('posts.edit', compact('post'));
    }

    public function editComment(Post $post, Comment $comment)
    {
        return View::make('comments.edit', compact('post', 'comment'));
    }

    public function updateComment(Post $post, Comment $comment)
    {
        $validator = Validator::make($input = Input::all(), Comment::$rules);
        if ($validator->fails()) {
            return Redirect::route('comments.edit', $post->id, $comment->id)->withErrors($validator);
        }
        $comment->update($input);

        return Redirect::route('posts.show', [$post->id, $comment->id])->with('message', 'Comment updated.');
    }

    public function destroyPost(Post $post)
    {
        $post->delete();

        return Redirect::route('posts.index')->with('message', 'Post deleted.');
    }

    public function destroyComment(Post $post, Comment $comment)
    {
        $comment->delete();

        return Redirect::route('posts.comments.show')->with('message', 'Comment deleted.');
    }

    //editinta

    public function authenticate()
    {
        if(Auth::attempt($data = Input::only(['email', 'password']))){
            return Redirect::route('ahome');
        }

        return Redirect::route('login')->withInput()->with('flash_error', 'Invalid credentials');
    }

    public function alogout()
    {
        if(Auth::check()){
            Auth::logout();
        }
        return Redirect::route('login');
    }
    public function alogin()
    {
        return View::make('users.login');
    }

}
