<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Post;

class Posts extends BaseController
{
	public function index(){
		return view('Admin/posts');
	}

	public function create(){
		$model = model('CategoriesModel');

		return view('Admin/posts_create', ['categories'=> $model->findAll()]);
	}

	public function store(){
		/* Validating data from the form  */
		if(!$this->validate([
			'title' => 'required',
			'body' => 'required',
			'published_at' => 'required|valid_date',
			'categories.*' => 'permit_empty|is_not_unique[categories.id]', /* To each element validate*/
			'cover' => 'uploaded[cover]|is_image[cover]', /* Validate input file */
		])){
			/* Return Errors to form */
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		/* Get file */
		$file = $this->request->getFile('cover');

		/* Send data to entity */
		$post = new Post($this->request->getPost());
		$post->slug = $this->request->getVar('title');
		$post->author = session()->id_user;
		$post->cover = $file->getRandomName(); /* Rename image file */

		/* Upload file to the server */
		$file->store('covers/', $post->cover);

		$postModel = model('PostModel');
		$postModel->assignCategories($this->request->getVar('categories'));
		$postModel->insert($post); /* Make insert to posts and categories_post */

		return redirect()->route('posts')->with('msg', ['type'=> 'success', 'body' => 'El artículo fue guardado correctamente.']);
	}
}