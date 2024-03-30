<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/user', 'Users::index');
$routes->post('/user/save', 'Users::save');
$routes->get("user/getById/(:num)", "Users::getById/$1");
$routes->post("user/update/(:num)", "Users::updateUser/$1");
$routes->get("user/delete/(:num)", "Users::deleteUser/$1");

$routes->get('/customer', 'Customer::index');

$routes->get('/sample', 'Sample::index');
$routes->post("/sample/saveField", "Sample::saveField");

$routes->get('/error', 'Error::index');
