<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('logout', 'Auth::logout');

$routes->group('auth', function ($routes) {
    $routes->get('/', 'Auth::index');
    $routes->post('createurl', 'Auth::createurl');
    $routes->get('proses', 'Auth::proses');
});

$routes->group('other', function ($routes) {
    $routes->get('kalender', 'Other::kalender');
});

$routes->group('person', function ($routes) {
    $routes->get('/', 'Person::index');
    $routes->post('detail/(:num)', 'Person::detail/$1');
});

$routes->group('nikah', function ($routes) {
    $routes->get('masuk', 'Nikah::masuk');
});
$routes->group('proses', function ($routes) {
    $routes->post('data_masuk', 'Proses::data_masuk');
    $routes->post('person', 'Proses::person');
    $routes->post('edit_person/(:num)', 'Proses::edit_person/$1');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
