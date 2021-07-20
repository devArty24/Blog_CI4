<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {   
        /* Validate all routes to admin in case that not exist user loged */
        if(!session()->is_logged){
            return redirect()->route('login')->with('msg', ['type' => 'warning',
                                                            'body' => 'Para acceder a este sitio, primero debes iniciar sesion.']);
        }

        /* Charge user model */
        $model = model('UsersModel');
        if(!$user = $model->getUserBy('id', session()->id_user)){
            session()->destroy();
            return redirect()->route('login')->with('msg', ['type' => 'danger',
                                                            'body' =>'El usuario actualmente no esta ctivo']);
        }

        /* Verify that name_group exist in the array de arguments */
        if(!in_array($user->getRole()->name_group, $arguments)){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}