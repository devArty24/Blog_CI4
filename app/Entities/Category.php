<?php namespace App\Entities;

use CodeIgniter\Entity;
use Hashids\Hashids;

class Category extends Entity{
    protected $date = ['created_at', 'updated_at'];

    /* Return link to actions edit or deleted */
    public function getLinkEdit(){
        return base_url(route_to('categories_edit', $this->id));
    }

    public function getLinkDelet(){
        $hashids = new Hashids();

        return base_url(route_to('categories_deleted', $hashids->encode($this->id)));
    }

}