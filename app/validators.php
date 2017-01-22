<?php

Validator::extend('tags', function($attribute, $value, $parameters)
{

  $tags = explode(',', $value);
    foreach ($tags as $tag) {
		if(strlen(trim($tag)) > 50) {
			return false;
		} 
	}
 	return true;

});