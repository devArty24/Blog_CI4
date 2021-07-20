<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Hashids\Hashids;

class Categories extends BaseController
{
	public function index(){
        $model = model('CategoriesModel');

        /* Return view with pagination in the model */
		return view('Admin/categories', [
            'categories' => $model->orderBy('created_at', 'DESC')->paginate(config('Blog')->regPerPage),
            'pager' => $model->pager
        ]);
	}

    /* View form create category */
    public function create(){
        return view('Admin/categories_create');
    }

    /* Save new category */
    public function store(){
        if(!$this->validate([
            'name' => 'required|max_length[120]'
        ])){

            /* Return errors of validation */
            return redirect()->back()->withInput()->with('msg', ['type' => 'danger', 'body' => 'Tienes campos incorrectos'])
                                                  ->with('errors', $this->validator->getErrors());
        }

        $model = model('CategoriesModel');
        $model->save(['name'=> trim($this->request->getVar('name'))]);

        return redirect('categories')->with('msg', ['type'=> 'success', 'body'=> 'La categoria fue guardada correctamente']);
    }

    /* View form update category */
    public function edit(string $id){
        $model = model('CategoriesModel');

        /* In case of that return null send page Error 404 */
        if(!$category = $model->find($id)){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('Admin/categories_edit', ['category'=> $category]);
    }

    /* Save the change update */
    public function update(){
        if(!$this->validate([
            'name' => 'required|max_length[120]',
            'id' => 'required|is_not_unique[categories.id]'
        ])){
            /* Return errors of validation */
            return redirect()->back()->withInput()->with('msg', ['type' => 'danger', 'body' => 'Tienes campos incorrectos'])
                                                  ->with('errors', $this->validator->getErrors());
        }

        $model = model('CategoriesModel');
        $model->save([
                'id' => trim($this->request->getVar('id')),
                'name'=> trim($this->request->getVar('name'))
        ]);

        return redirect('categories')->with('msg', ['type'=> 'success', 'body'=> 'La categoria fue actualizada correctamente']);

    }

    public function deleted(string $id){
        $hash = new Hashids();
        $id = $hash->decode($id);

        /* Deleted a category */
        $model = model('CategoriesModel');
        $model->delete($id);

        return redirect('categories')->with('msg', ['type'=> 'success', 'body'=> 'La categoria fue eliminada correctamente']);

    }
}