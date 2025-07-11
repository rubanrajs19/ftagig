<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Home::ftagig');
$routes->get('admin/login', 'Admin\Auth::login');
$routes->post('admin/login', 'Admin\Auth::login');
$routes->get('admin/logout', 'Admin\Auth::logout');
$routes->post('onboarding/submit', 'Onboarding::submit');

$routes->get('individual-service/(:segment)', 'Home::individualService/$1');
$routes->get('bundled-service/(:segment)', 'Home::bundleService/$1');
$routes->get('search-services', 'SearchController::searchServices');

$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('services', 'Admin\Services::index');
    $routes->match(['get', 'post'], 'services/create', 'Admin\Services::create');
    $routes->match(['get', 'post'], 'services/edit/(:num)', 'Admin\Services::edit/$1');
    $routes->get('services/delete/(:num)', 'Admin\Services::delete/$1');

    $routes->get('categories', 'Admin\Categories::index');
    $routes->match(['get', 'post'], 'categories/create', 'Admin\Categories::create');
    $routes->match(['get', 'post'], 'categories/edit/(:num)', 'Admin\Categories::edit/$1');
    $routes->get('categories/delete/(:num)', 'Admin\Categories::delete/$1');
    $routes->get('services/toggle/(:num)', 'Admin\Services::toggle/$1');
    $routes->get('services/clone/(:num)', 'Admin\Services::clone/$1');

    $routes->get('onboarding', 'Admin\Admin::onboarding');
});