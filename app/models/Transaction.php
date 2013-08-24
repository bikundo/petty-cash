<?php

class Transaction extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

     public function comments()
    {
        return $this->hasMany('Comment');
    }
    public function user()
    {
        return $this->belongsTo('User');
    }

}