<?php

class Tag extends Eloquent {

    protected $table = 'tags';
	public $timestamps = true;
	protected $fillable = array('tag','tag_url');

	public function posts()
	{
		return $this->belongsToMany('Post');
	}

}