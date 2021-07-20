<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('App\Controllers\Front\Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
//True block the charge for Controlller/function $routes->setAutoRoute(true);
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/* Routes Group */
$routes->group('/', ['namespace'=> 'App\Controllers\Front'], function($routes){
	$routes->get('', 'Home::index', ['as' => 'home']);
	$routes->get('articulo/(:segment)', 'Home::article/$1', ['as'=> 'article']);

});

$routes->group('auth', ['namespace'=> 'App\Controllers\Auth'], function($routes){
	$routes->get('registro', 'Register::index', ['as' => 'register']);
	$routes->post('store', 'Register::store');
	$routes->get('login', 'Login::index', ['as' => 'login']);
	$routes->post('check', 'Login::signin', ['as' => 'signin']);
	$routes->get('logout', 'Login::signout', ['as' => 'signout']);
});

/* Route Group with filter by user loged */
$routes->group('admin', ['namespace'=> 'App\Controllers\Admin', 'filter' => 'auth:admin'], function($routes){
	$routes->get('articulos', 'Posts::index', ['as' => 'posts']);
	$routes->get('articulos/create', 'Posts::create', ['as' => 'posts_create']);
	$routes->post('articulos/guardar', 'Posts::store', ['as' => 'posts_store']);

	$routes->get('categorias', 'Categories::index', ['as' => 'categories']);
	/* Routes create new category */
	$routes->get('categorias/crear', 'Categories::create', ['as' => 'categories_create']);
	$routes->post('categorias/guardar', 'Categories::store', ['as' => 'categories_store']);
	/* Routes update category */
	$routes->get('categorias/edit/(:any)', 'Categories::edit/$1', ['as' => 'categories_edit']);
	$routes->post('categorias/actualizar', 'Categories::update', ['as' => 'categories_updated']);
	$routes->get('categorias/eliminar/(:any)', 'Categories::deleted/$1', ['as' => 'categories_deleted']);
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
