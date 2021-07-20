<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Post;

class PostModel extends Model
{
	protected $table                = 'posts';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $returnType           = Post::class;
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['title', 'slug', 'body', 'cover', 'author', 'published_at'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Callbacks
	protected $allowCallbacks       = true;
	protected $afterInsert          = ['storeCategories']; /* This callback will run after that insert register in table posts */

	/* This var will store the cateories that arrive */
	protected $categories = [];

	public function published(){
		$this->where('published_at <= ', date('Y-m-d H:i:s'));

		return $this;
	}

	/* This function is the callback that recibed data of the new register in table posts*/
	public function storeCategories(array $data){
		/* Comparate that categories isn't null or empty */
		if(!empty($this->categories)){
			$cpModel = model('CategoriesPosts');

			$cats = [];
			foreach($this->categories as $category){
				/* Make a push */
				$cats[] = [
					'id_post' => $data['id'],
					'id_category' => $category
				];
			}
			$cpModel->insertBatch($cats);
		}
		/* If the categories is null or empty only return data */
		return $data;
	}
	
	public function assignCategories(array $categories){
		/* Assign the categories */
		$this->categories = $categories;
	}

	public function getPostsByCategory(string $category){
		return $this
					->select('posts.*')
					->join('categories_posts', 'posts.id = categories_posts.id_post')
					->join('categories', 'categories.id = categories_posts.id_category')
					->where('categories.name', $category);
	}	


}
