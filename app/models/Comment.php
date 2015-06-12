<?php
class Comment extends Eloquent {

    protected $table = 'comments';

    protected $fillable = ['commenter', 'comment'];

    public static $rules = [
        'commenter' => 'required',
        'comment' => 'required',
    ];

    public function post()
    {
        return $this->belongsTo('Post');
    }

    public function user()
    {
        return $this->belongsTo('user');
    }
}