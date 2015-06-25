<?php
class Comment extends Eloquent {

    protected $table = 'comments';

    protected $fillable = ['comment'];

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