<?php namespace Lib\Gestion;

interface PostGestionInterface {

    public function liste($n);
	public function save();
	public function del($id);
	public function tag($tag, $n);

}