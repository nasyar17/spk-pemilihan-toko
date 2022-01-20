<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->group('auth', ['namespace' => 'IonAuth\Controllers'], function ($routes) {
// 	$routes->add('login', 'Auth::login');
// 	$routes->get('logout', 'Auth::logout');
// 	$routes->add('forgot_password', 'Auth::forgot_password');
// 	// $routes->get('/', 'Auth::index');
// 	// $routes->add('create_user', 'Auth::create_user');
// 	// $routes->add('edit_user/(:num)', 'Auth::edit_user/$1');
// 	// $routes->add('create_group', 'Auth::create_group');
// 	// $routes->get('activate/(:num)', 'Auth::activate/$1');
// 	// $routes->get('activate/(:num)/(:hash)', 'Auth::activate/$1/$2');
// 	// $routes->add('deactivate/(:num)', 'Auth::deactivate/$1');
// 	// $routes->get('reset_password/(:hash)', 'Auth::reset_password/$1');
// 	// $routes->post('reset_password/(:hash)', 'Auth::reset_password/$1');
// 	// ...
// });

$routes->get('/', 'Dashboard::index');
// $routes->get('/criteria/add', 'Criteria::add');
// $routes->get('/criteria/update/(:num)', 'Criteria::update/$1');
$routes->get('/criteria/atribut', 'Criteria::index');
$routes->get('/criteria/atribut/(:any)', 'Criteria::atribut/$1');
$routes->get('/criteria/editAtribut/(:any)', 'Criteria::editAtribut/$1');
$routes->delete('/criteria/deleteAtribut/(:any)', 'Criteria::deleteAtribut/$1');

$routes->delete('/criteria/(:any)', 'Criteria::delete/$1');
$routes->get('/criteria/(:any)', 'Criteria::detail/$1');

$routes->get('/training/add', 'Training::add');
$routes->delete('/training/(:any)', 'Training::delete/$1');
// $routes->get('/training/(:any)', 'Training::edit/$1');

$routes->get('/toko', 'Toko::index');
$routes->get('/toko/index2', 'Toko::index2');
$routes->get('/toko/toActive/(:any)', 'Toko::toActive/$1');
$routes->get('/toko/add', 'Toko::add');
$routes->get('/toko/update/(:any)', 'Toko::update/$1');
$routes->delete('/toko/(:any)', 'Toko::delete/$1');
$routes->get('/toko/(:any)', 'Toko::edit/$1');

// $routes->get('/', 'PdfController::index');




/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
