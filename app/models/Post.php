<?php

class Post extends Eloquent
{

    protected $fillable = ['title', 'content'];

    public static $rules = [
        'title' => 'required',
        'content' => 'required'
    ];

    public function comments()
    {
        return $this->hasMany('Comment');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

}