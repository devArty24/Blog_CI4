<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;

class Home extends BaseController
{
	public function index()
	{
		/* Charge helper to use a function character_limiter in view */
		helper('text');

		$post = model('PostModel');
		
		/* Return all register posts with pagination */
		return view('Front/home', [
			'posts'=> $post->published()->orderBy('published_at', 'DESC')->paginate(2),
			'pager'=> $post->pager
		]);
	}

	public function article($slug){
		$pModel = model('PostModel');

		if(!$post = $pModel->where('slug', $slug)->first()){
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}

		return view('Front/Article', ['post'=> $post]);
	}

	public function filter(array $args){
		helper('text');
		$post = model('PostModel');

		return view('Front/Filter', [
			'posts'=> $post->getPostsByCategory($args['category'])->findAll($args['limit'] ?? 0)
		]);
	}
}
