<?php
class Post extends Eloquent {

    protected $fillable = array('titre','contenu','user_id');
	public $timestamps = true;

	public function user() 
	{
		return $this->belongsTo('User');
	}

	public function tags()
	{
		return $this->belongsToMany('Tag');
	} 
	
}