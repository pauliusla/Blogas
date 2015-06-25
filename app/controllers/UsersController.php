<?php

class UsersController extends BaseController {

    public function indexSearch()
    {
        return View::make('users.indexSearch', compact('users'));
    }

    public function index()
    {
        if ($search = Input::get('search')) {

            $users = User::search($search)->paginate(10);

            return View::make('users.indexSearch', compact('users'));
        }

        $users = User::all();

        return View::make('users.index', compact('users'));
    }


    public function create()
    {
        return View::make('users.create');
    }


    public function store()
    {
        $data = Input::all();

        $validator = Validator::make($data, User::$rules);

        if($validator->fails()) {

            return Redirect::route('users.create')->withErrors($validator);
        }

        User::create($data);

        return Redirect::route('users.index')->with('success', trans('users.messages.create_success'));
    }


    public function show(User $user)
    {
        return View::make('users.show', compact('user'));
    }


    public function edit(User $user)
    {
        return View::make('users.edit', compact('user'));
    }


    public function update(User $user)
    {
        $data = Input::all();

        $validator = Validator::make($data, User::$rules);

        if($validator->fails()) {

            return Redirect::route('users.edit', $user->id)->withErrors($validator);
        }

        $user->update($data);

        return Redirect::route('users.index')->with('success', trans('users.messages.update_success'));
    }


    public function destroy(User $user)
    {
        $user->delete();

        return Redirect::route('users.index')->with('success', trans('users.messages.destroy_success'));
    }

    public function authenticate()
    {
        if(Auth::attempt($data = Input::only(['email', 'password']))){

            return Redirect::route('home');
        }

        return Redirect::route('login')->withInput()->with('flash_error', 'Invalid credentials');
    }

    public function profile()
    {
        return View::make('users.profile');
    }

    public function logout()
    {
        if(Auth::check()){

            Auth::logout();
        }

        return Redirect::route('login');
    }

    public function login()
    {
        return View::make('users.login');
    }
}