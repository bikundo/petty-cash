<?php

class Comment extends Eloquent {
	 public function transaction()
    {
        return $this->belongsTo('Transaction');
    }

    protected $guarded = array();

    public static $rules = array();
}