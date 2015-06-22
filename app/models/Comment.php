<?php
class Comment extends Eloquent {

    protected $table = 'comments';

    protected $fillable = ['comment'];

    public function isAuthor()
    {
        return $this->user_id == Auth::user()-> id;
    }

    public static $rules = [
        'comment' => 'required|string',
    ];

    public function post()
    {
        return $this->belongsTo('Post');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}