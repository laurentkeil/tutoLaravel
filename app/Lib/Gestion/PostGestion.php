<?php namespace Lib\Gestion;

use Post, Tag, Input, Auth, Str;

class PostGestion implements PostGestionInterface {

    public function liste($n)
	{
		$posts = Post::with('user', 'tags')
		->orderBy('posts.created_at', 'desc')
		->paginate($n);
		return compact('posts');
	}

	public function save()
	{
		$post = Post::create(array(
			'titre' => Input::get('titre'),
			'contenu' => Input::get('contenu'),
			'user_id' => Auth::user()->id
		));
		if(Input::has('tags')) {
			$post = Post::find($post->id);
			$tags = explode(',', Input::get('tags'));
			foreach ($tags as $tag) {
				$tag = trim($tag);
				if($tag != "") {
					$tag_url = Str::slug($tag);
					$tag_ref = Tag::where('tag_url', $tag_url)->first();
					if(is_null($tag_ref)) {
						$tag_ref = new Tag(array(
							'tag' => $tag,
							'tag_url' => $tag_url
						));	
						$post->tags()->save($tag_ref);
					} else {
						$post->tags()->attach($tag_ref->id);
					}
				}
			}
		}
	}

	public function del($id)
	{
		if(!is_null($post = Post::find($id))) {
			$post->tags()->detach();
			$post->delete();
		}
	}

	public function tag($tag, $n)
	{
		$posts = Post::with('user', 'tags')
		->orderBy('posts.created_at', 'desc')
		->whereHas('tags', function($q) use ($tag)
		{
		  $q->where('tags.tag_url', $tag);
		})->paginate($n);
		return compact('posts');
	}

}