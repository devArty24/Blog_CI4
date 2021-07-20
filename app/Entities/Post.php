<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Post extends Entity
{
	protected $datamap = [];
	protected $dates   = [
		'created_at',
		'updated_at',
		'deleted_at',
		'published_at'
	];
	protected $casts   = [];

	protected function setSlug(string $title){
		$slug = mb_url_title($title, '-');

		$posModel = model('PostModel');

		while($posModel->where('slug', $slug)->find() != null){
			/* When finish while, if and exist a title same to those of the db asign at finish the tiele a _number */
			$slug = increment_string($slug, '_');
		}

		/* When finished the while, asign value $slug to the entitie */
		$this->attributes['slug'] = $slug;
	}

	/* Relationship between entities */
	public function getAuthor(){
		/* If the attribute author isn't empty then make a query where id_user it's same to attribute author that content a id */
		if(!empty($this->attributes['author'])){
			$userInfoModel = model('UsersInfoModel');
			return $userInfoModel->where('id_user', $this->attributes['author'])->first();
		}

		return $this;
	}

	/* Function to get all of table categories with a join */
	public function getCategories(){
		$cpModel = model('CategoriesPosts');

		/* Search to id_post that stay in the foreach of view and if case to arrive empty that return a array empty */
		return $cpModel->where('id_post', $this->id)->join('categories', 'categories.id = categories_posts.id_category')->findAll() ?? [];
	}

	/* Generate link to image */
	public function getLink(){
		/* Here create a symbolic link to acces a folder writeble */
		return $rutaImagen = base_url('covers/'.$this->cover);
	}

	/* Generate lint to the card (to each article) */
	public function getLinkArticle(){
		return base_url(route_to('article', $this->slug));
	}
}
