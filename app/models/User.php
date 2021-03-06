<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';

    protected $fillable = ['first_name', 'last_name', 'email', 'password'];

    protected $table = 'users';

    protected $hidden = ['password', 'remember_token'];

    public function scopeSearch($query, $search)
    {
        return $query->where('email', 'like', '%' . $search . '%');
    }

    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|unique:users|email',
        'password'=>'required|min:5'
    ];

    public function isAdmin()
    {
        return $this->role == static::ROLE_ADMIN;
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);

    }

    public function posts()
    {
        return $this->hasMany('Post');
    }

    public function comments()
    {
        return $this->hasMany('Comment');
    }

}
